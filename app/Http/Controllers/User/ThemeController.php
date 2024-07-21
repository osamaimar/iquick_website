<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{CrudEvents, Order, Profile, Status};
use App\RepositoryInterface\{ProfileInterface,OrderInterface};
use Auth;
class ThemeController extends Controller
{

    private $repositoryProfile;
    private $repositoryOrder;

    public function __construct(ProfileInterface $repositoryProfile,OrderInterface $repositoryOrder)
    {
        $this->repositoryProfile=$repositoryProfile;
        $this->repositoryOrder=$repositoryOrder;
    }

    public function index(){

        // if (session()->get('profile_id') == null || Profile::where("user_id",Auth::user()->id)->first()==null) {
        //     return redirect()->route("user.register/profile/view");
        // }
        if (session()->get('profile_id') == null) {
            $profile=Profile::where("user_id",Auth::user()->id)->first();
            session()->put('profile_id' , $profile->id);
        }
        $events=[];
        $status=[];
        $data = CrudEvents::where("client_id",Auth::user()->id)->get();
        foreach($data as $dat){
            $statu = Status::where("id","$dat->status")->first();
            $events[]=[
                'id'=>$dat->id,
                'event_name'=>$dat->event_name,
                'title'=>$dat->title,
                'description'=>$dat->description,
                'profile_id'=>Profile::where("id",$dat->profile_id)->first()->name,
                'status_name'=>$statu->title,
                'start'=>$dat->event_start,
                'end'=>$dat->event_end,
                'color'=>$statu->color
            ];
            $status[]=[
                'status_name'=>$statu->title,
                'color'=>$statu->color,
            ];
        };
        $status=array_map("unserialize", array_unique(array_map("serialize", $status)));
        return view("user.pages.theme.index",[
            'profile'=>$this->repositoryProfile->allProfiles(),
            'order'=>$this->repositoryOrder->orderUser(Auth::user()),
            'events'=>$events,
            'status'=>$status,
            'latest_orders'=>Order::where("user_id",Auth::user()->id)->orderBy("status","Desc")->latest()->take(3)->get(),
            'orders_canceld'=>Order::where("user_id",Auth::user()->id)->where("status","canceled")->get(),
            'orders_count'=>Order::where("user_id",Auth::user()->id)->count(),
        ]);

        
    }

    public function mode(){
        setcookie("mode","dark",time()+360*360*60,"/");
        if(isset($_COOKIE['mode']) && $_COOKIE['mode']=="dark"){
            setcookie("mode","ligth",time()+360*360*60,"/");
        }
        return back();
    }
}
