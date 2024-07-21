<?php

namespace App\Http\Controllers\User\Service;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session()->get('profile_id') == null) {
            $profile=Profile::where("user_id",Auth::user()->id)->first();
            session()->put('profile_id' , $profile->id);
        }
        
        $orderId = $request->query('order_id');

        $search = (request()->input('search') != null) ? request()->input('search') : null;
        $service = Service::where("status",'1')->where('name','LIKE', '%'.$search.'%')->orderBy("id","Desc")->get();

        return view("user.pages.service.index",[
            'service'=>$service,
            'orderId'=>$orderId,
        ]);
    }

    
}
