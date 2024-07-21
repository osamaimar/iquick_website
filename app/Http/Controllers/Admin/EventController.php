<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CrudEventsExport;
use App\Http\Controllers\Controller;
use App\Models\{CrudEvents, Status, User,Service};
use Illuminate\Http\Request;
use App\Http\Requests\StoreCalendarRequest;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:event-list', ['only' => ['index','show']]);
        $this->middleware('permission:event-create', ['only' => ['create','store']]);
        $this->middleware('permission:event-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:event-delete', ['only' => ['destroy']]);
        $this->middleware('permission:event-export', ['only' => ['export']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.event.index",[
            'event'=>CrudEvents::orderBy('event_start', 'desc')->paginate()
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrudEvents  $crudEvents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.pages.event.edit",[
            'event'=>CrudEvents::find($id),
            'client'=>User::where("type","user")->get(),
            'status'=>Status::all(),
            'services'=>Service::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrudEvents  $crudEvents
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCalendarRequest $request,$id)
    {
        $request->validated();
        $event=CrudEvents::find($id);
        $event->update($request->all());
        return redirect("dashborad/events/$event->id/edit")->withSuccess(__("admin.updated successfully")); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrudEvents  $crudEvents
     * @return \Illuminate\Http\Response
     */
    public function destroy($crudEvents)
    {
        $crudEvents=CrudEvents::find($crudEvents);
        $crudEvents->forceDelete();
        return response()->json([
            'success' => __("admin.deleted"),
            'id'      =>  $crudEvents->id
        ]);
    }

    public function export(Request $request) 
    {
        $user_id=null;
        $month=date('Y-m', strtotime($request->month));
        if($month!=null){
            if(CrudEvents::where("client_id",$user_id)->where("event_start",'LIKE',"%{$month}%")->first()!=null){
                return Excel::download(new CrudEventsExport($month,$user_id), 'events.xlsx');
            }else if(CrudEvents::where("event_start",'LIKE',"%{$month}%")->first()!=null&&$user_id==null){
                return Excel::download(new CrudEventsExport($month,$user_id), 'events.xlsx');
            }else{
                return back()->withWarning(__("admin.not_found"));
            }
        }else{
            if(CrudEvents::first()!=null){
                return Excel::download(new CrudEventsExport($month,$user_id), 'events.xlsx');
            }else{
                return back()->withWarning(__("admin.not_found"));
            }
        }
    }
}
