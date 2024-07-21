<?php

namespace App\Http\Controllers\Admin;

use App\Events\EventUser;
use App\Events\EventUserAttach;
use App\Http\Controllers\Controller;
use App\Models\AssignedTask;
use App\Models\Notice;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class AssignedTaskController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('permission:assignedtask-list', ['only' => ['index','show']]);
        $this->middleware('permission:assignedtask-create', ['only' => ['create','store']]);
        $this->middleware('permission:assignedtask-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:assignedtask-delete', ['only' => ['destroy']]);
        $this->middleware('permission:assignedtask-allAssign', ['only' => ['allAssign']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.assign.index',[
            'assignedtask'=>AssignedTask::where('user_task_id',Auth::user()->id)->orderBy("id",'desc')->paginate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'notes'=>'nullable|max:500',
            'user_id'=>"required",
        ]);
        AssignedTask::create([
            'admin_id'=>Auth::user()->id,
            'user_task_id'=>$request->user_id,
            'order_id'=>$request->assigned_task_id,
            'notes'=>$request->notes,
            'start_date'=>Carbon::now(),
        ]);
        Order::where("id", $request->assigned_task_id)->first()->update([
            'status'=>'pending'
        ]);
        $order=Order::where("id", $request->assigned_task_id)->first();
        $data1=[
            'order_id'=>$order->id,
            'messages'=>' تم تغير '.__("admin.status") .' الى '. __("admin.$order->status"),
            'status'=>$order->status,
            'username'=>"رقم الطلب",
            'order_code'=>$order->code,
            'user_id'=>$order->user_id,
            "employee_type"=>Auth::user()->type_user!="1"?"0":"1",
            "employee_id"=>Auth::user()->id,
        ];
        broadcast(new EventUser($data1))->toOthers();
        Notice::create([
            'order_id'=>$order->id,
            'messages'=>' تم تغير '.__("admin.status") .' الى '. __("admin.$order->status"),
            'order_status'=>$order->status,
            'user_name'=>"رقم الطلب",
            'order_code'=>$order->code,
            'user_id'=>$order->user_id,
            "employee_type"=>Auth::user()->type_user!="1"?"0":"1",
            "employee_id"=>Auth::user()->id,
        ]);
        $data=[
            'order_id'=>$order->id,
            'messages'=>'تم اسناد مهمه الى'.User::where("id",$request->user_id)->first()->firstname.' '.User::where("id",$request->user_id)->first()->lastname.'بواسطه'.Auth::user()->firstname.' '.Auth::user()->lastname,
            'filed_name'=>__("admin.assignedtasks"),
            'attchname'=>Order::where("id", $request->assigned_task_id)->first()->code,
            'user_id'=>$request->user_id,
            'user_name'=>"رقم الطلب",
            "employee_type"=>"1",
            "employee_id"=>$request->user_id,
        ];
        broadcast(new EventUserAttach($data))->toOthers();
        Notice::create([
            'order_id'=>$order->id,
            'messages'=>' تم اسناد مهمه الى '. User::where("id",$request->user_id)->first()->firstname.' '.User::where("id",$request->user_id)->first()->lastname.' بواسطه '.Auth::user()->firstname.' '.Auth::user()->lastname,
            'filed_name'=>__("admin.assignedtasks"),
            'attchname'=>Order::where("id", $request->assigned_task_id)->first()->code,
            'user_id'=>$request->user_id,
            'user_name'=>"رقم الطلب",
            "employee_type"=>"1",
            "employee_id"=>$request->user_id,
        ]);
        return response()->json(['success'=>__("admin.added successfully")]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignedTask  $assignedTask
     * @return \Illuminate\Http\Response
     */
    public function editTask($id,$type)
    {
        $assignedTask=AssignedTask::where('id',$id)->first();
        if($type=='start'){
            $assignedTask->update([
                'start_date'=>date("Y-m-d H:i:s"),
            ]);
        }else{
            $assignedTask->update([
                'end_date'=>date("Y-m-d H:i:s"),
            ]);
        }
        
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignedTask  $assignedTask
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignedTask=AssignedTask::where('id',$id)->first();
        $assignedTask->update([
            'start_date'=>date("Y-m-d H:i:s"),
        ]);
        return back();
    }

    public function destroy(AssignedTask $assignedtask)
    {
        $assignedtask->delete();
        return response()->json(['success'=>__("admin.deleted"),'id'=>$assignedtask->id]);
    }

    public function allAssign()
    {
        return view('admin.pages.assign.all-assign',[
            'assignedtask'=>AssignedTask::orderBy("id",'desc')->paginate()
        ]);
    }

}
