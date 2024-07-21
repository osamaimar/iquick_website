<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CrudEvents;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:status-list', ['only' => ['index','show']]);
        $this->middleware('permission:status-create', ['only' => ['create','store']]);
        $this->middleware('permission:status-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:status-delete', ['only' => ['destroy']]);
        $this->middleware('permission:status-effective', ['only' => ['changeStatus']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.status.index",[
            'status'=>Status::orderBy("id","desc")->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.status.create");
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
            'title' => "required|min:2|max:25",
            'color' => "required|min:2|max:25",
        ]);
        Status::create($request->all());
        return redirect("dashborad/status/create")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view("admin.pages.status.edit",[
            'status'=>$status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $request->validate([
            'title' => "required|min:2|max:25",
            'color' => "required|min:2|max:25",
        ]);
        $status->update($request->all());
        return redirect("dashborad/status/$status->id/edit")->withSuccess(__("admin.updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        if(CrudEvents::where("status",$status->id)->first()){
            return response()->json(['success'=>__('admin.can_not_dele'),'icon'=>'warning']);
        }else{
            $status->delete();
            return response()->json(['success'=>__("admin.deleted"),'icon'=>'success','id'=>$status->id]);
        }
        
    }

    public function changeStatus(Request $request,Status $status){
        $status->update([
            "status"=>$request->status,
        ]);
        return redirect("dashborad/status")->withSuccess(__("admin.updated successfully"));
    }
}
