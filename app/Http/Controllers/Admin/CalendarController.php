<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CrudEventsExport;
use App\Http\Controllers\Controller;
use App\Models\{CrudEvents,User,Profile, Status,Service};
use Illuminate\Http\Request;
use App\Http\Requests\StoreCalendarRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class CalendarController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:calendar-list', ['only' => ['index','show']]);
        $this->middleware('permission:calendar-create', ['only' => ['create','calendarEvents']]);
        $this->middleware('permission:calendar-edit', ['only' => ['edit','update','calendarEventsUpdate']]);
        $this->middleware('permission:calendar-delete', ['only' => ['destroy']]);
        $this->middleware('permission:calendar-export', ['only' => ['export']]);
    }

    public function userCalendar(Request $request)
    {
        session()->put('userCalendar_id' , $request->clientuser_id);
        return back();
    }
    public function index(Request $request)
    {
        $userCalendar_id=session()->get('userCalendar_id');
        $events=[];
        if($userCalendar_id!=null){
            $data = CrudEvents::where('client_id',$userCalendar_id)->get();
        }else{
            $data = CrudEvents::all();
        }
        foreach($data as $dat){
            $status = Status::where("id","$dat->status")->first();
            $events[]=[
                'id'=>$dat->id,
                'event_name'=>$dat->event_name,
                'title'=>$dat->title,
                'description'=>$dat->description,
                'start'=>$dat->event_start,
                'client_id'=>$dat->client_id,
                'profile_id'=>$dat->profile_id,
                'color'=>$status->color,
                'status'=>$status->id,
                'end'=>$dat->event_end,
            ];
        };
        return view('admin.pages.calendar.index',[
            'client'=>User::where('type','user')->get(),
            'events'=>$events,
            "profile"=>Profile::where("user_id",$userCalendar_id)->get(),
            'status'=>Status::where("status","1")->get(),
            'services'=>Service::where("status",'1')->orderBy("id","Desc")->get(),
        ]);
    }

    public function getProfile(User $user)
    {
        $profile=Profile::where('user_id',$user->id)->get();
        return response()->json($profile);
    }
 
    public function calendarEvents(StoreCalendarRequest $request)
    {

        $event = CrudEvents::create([
            'title'=>$request->title,
            'event_name' => $request->event_name,
            'event_start' => $request->event_start,
            'event_end' => $request->event_end,
            'description'=>$request->description,
            'client_id'=>$request->client_id,
            'profile_id'=>$request->profile_id,
            'status'=>$request->status
        ]);
        $event->status=$request->status;
        $event->save();
        $status = Status::where("id","$event->status")->first();
        return response()->json([
            'id'=>$event->id,
            'event_name'=>$event->event_name,
            'title'=>$event->title,
            'description'=>$event->description,
            'client_id'=>$event->client_id,
            'profile_id'=>$event->profile_id,
            'status'=>$status->id,
            'start'=>$event->event_start,
            'end'=>$event->event_end,
            'color'=>$status->color
        ]);  
    }

    public function calendarEventsUpdate(StoreCalendarRequest $request){
        
        $event = CrudEvents::find($request->event_id);
        $event->update([
            'title'=>$request->title,
            'event_name' => $request->event_name,
            'description'=>$request->description,
            'client_id'=>$request->client_id,
            'profile_id'=>$request->profile_id,
            'status'=>$request->status,
        ]);

        $event->status=$request->status;
        $event->save();
        $status = Status::where("id","$event->status")->first();
        return response()->json([
            'id'=>$event->id,
            'event_name'=>$event->event_name,
            'title'=>$event->title,
            'description'=>$event->description,
            'client_id'=>$event->client_id,
            'profile_id'=>$event->profile_id,
            'status'=>$status->id,
            'color'=>$status->color
        ]);
    }

    public function update(Request $request){
        $event = CrudEvents::find($request->id)->update([
            'event_start' => $request->event_start,
            'event_end' => $request->event_end,
        ]);

        return response()->json($event);
    }

    public function destroy(Request $request){
            $event = CrudEvents::find($request->id)->delete();
            return response()->json($event);
    }
    
    public function exportPdf() {
        $userCalendar_id=session()->get('userCalendar_id');
        if($userCalendar_id!=null){
            $events = CrudEvents::where('client_id',$userCalendar_id)->get();
        }else{
            $events = CrudEvents::all();
        }
        $pdf = PDF::loadView('general-components.admin.calendar', compact('events'));
        return $pdf->download('calendar.pdf');
        
      }
    public function export(Request $request) 
    {
        $user_id=session()->get('userCalendar_id');
        $month=date('Y-m', strtotime($request->month));
        if($month!=null){
            if(CrudEvents::where("client_id",$user_id)->where("event_start",'LIKE',"%{$month}%")->first()!=null){
                return Excel::download(new CrudEventsExport($month,$user_id), 'events.xlsx');
            }elseif(CrudEvents::where("event_start",'LIKE',"%{$month}%")->first()!=null&&$user_id==null){
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
