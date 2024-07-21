<?php

namespace App\Http\Controllers\user;

use App\Exports\User\CrudEventsExport;
use App\Http\Controllers\Controller;
use App\Models\{CrudEvents, Profile, Status};
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCalendarRequest;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view("user.pages.event.index",[
            'events'=>$events,
            'status'=>$status
        ]);
    }
    // public function show($id)
    // {
    //     $data = CrudEvents::where("client_id",Auth::user()->id)->where("id",$id)->first();
    //     return response()->json([
    //         'description'=>$data->description
    //     ]);
    // }


    public function export(Request $request) 
    {
        $month=date('Y-m', strtotime($request->month));
        if($month!=null){
            if(CrudEvents::where("client_id",Auth::user()->id)->where("event_start",'LIKE',"%{$month}%")->first()!=null){
                return Excel::download(new CrudEventsExport($month), 'events.xlsx');
            }else{
                return back()->withWarning(__("admin.not_found"));
            }
        }else{
            if(CrudEvents::where("client_id",Auth::user()->id)->first()!=null){
                return Excel::download(new CrudEventsExport($month), 'events.xlsx');
            }else{
                return back()->withWarning(__("admin.not_found"));
            }
        }
    }
}
