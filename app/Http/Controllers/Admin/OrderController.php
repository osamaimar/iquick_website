<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Order,Attachment,User,AssignedTask, Notice, Package, PackageArchive, Service, Stock};
use App\Http\Requests\StoreMultipleFile;
use App\Http\Requests\UpdateOrderRequest;
use App\RepositoryInterface\OrderInterface;
use Auth;
use Storage;
use App\Traties\{UploadFile,GetData};
use PDF;
use App\Events\EventUser;
use App\Events\EventUserAttach;
use App\Events\MyEvent;
use App\Exports\ListOrderExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{

    use UploadFile;
    use GetData;

    private $repositoryOrder;

    public function __construct(OrderInterface $repositoryOrder)
    {
        $this->repositoryOrder=$repositoryOrder;
        $this->middleware('permission:order-list', ['only' => ['index']]);
        $this->middleware('permission:order-create', ['only' => ['create','store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);
        $this->middleware('permission:order-export', ['only' => ['export']]);
        $this->middleware('permission:order-listOrder', ['only' => ['listOrder']]);
        $this->middleware('permission:order-listOrderExport', ['only' => ['listOrderExport']]);
        $this->middleware('permission:order-show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.order.index",[
            'order'=>$this->repositoryOrder->all(),
            'user'=>User::where('type','admin')->get(),
            'service'=>Service::all(),
            'package'=>Package::all()
        ]);
    }

    public function listOrder()
    {
        return view("admin.pages.order.listorder",[
            'order'=>$this->repositoryOrder->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMultipleFile  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMultipleFile $request)
    {
        $request->validated();
        $request->validate([
            'description'=>"nullable|min:3|max:100000000000",
        ]);
        if($request->has('attachment_file')&&$request->attachment_file['0']!=null){
            foreach($request->attachment_file as $file){
                $request->attachment_file=$this->uploadFile($file,'/images/orders/attachments/');
                $attachment=$this->repositoryOrder->attachmentFile($this->getAttachmentTypeOrder($request,"App\Models\Order"));
                $attachment->description=$request->description;
                $attachment->save();
                // $data=[
                //     'filed_name'=>__("admin.orders"),
                //     'attchname'=>__("admin.addedAttach"),
                //     'user_id'=>Order::where("id",$request->order_id)->first()->user_id,
                // ];
                // broadcast(new EventUserAttach($data))->toOthers();
            }
        }else{
            $attachment=$this->repositoryOrder->attachmentFile($this->getAttachmentTypeOrder($request,"App\Models\Order"));
            $attachment->description=$request->description;
            $attachment->save();
        }
        $order=Order::where("id",$request->order_id)->first();
        // $data1=[
        //     'order_id'=>$order->id,
        //     'messages'=>'تم اضافه ملف',
        //     'status'=>$order->status,
        //     'username'=>"رقم الطلب",
        //     'order_code'=>$order->code,
        //     'user_id'=>$order->user_id,
        // ];
        // broadcast(new EventUser($data1))->toOthers();
        $data=[
            'order_id'=>$order->id,
            'messages'=>'تم اضافه ملف',
            'type_order'=>$order->type_order==='service'?__("admin.services").'\ '.$order->service->name:__("admin.packages").'\ '.$order->package->name,
            'username'=>"رقم الطلب",
            'order_code'=>$order->code,
            "employee_type"=>Auth::user()->type_user!="1"?"0":"1",
            "employee_id"=>Auth::user()->id,
        ];
        broadcast(new MyEvent($data))->toOthers();
        Notice::create([
            'order_id'=>$order->id,
            'messages'=>'تم اضافه ملف',
            'order_status'=>$order->status,
            'user_name'=>"رقم الطلب",
            'order_code'=>$order->code,
            "employee_type"=>Auth::user()->type_user!="1"?"0":"1",
            "employee_id"=>Auth::user()->id,
        ]);
        
        return response()->json(['success'=>__("admin.added successfully")]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view("admin.pages.order.attachment",[
            'order'=>$order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $request->validated();
        $this->repositoryOrder->update(["status"=>$request->status],$order);
        if($request->status=="done"){
            AssignedTask::where("order_id",$order->id)->update([
                'end_date'=>Carbon::now(),
            ]);
        }else{
            AssignedTask::where("order_id",$order->id)->update([
                'end_date'=>null,
            ]);
        }
        $data=[
            'order_id'=>$order->id,
            'messages'=>' تم تغير '.__("admin.status") .' الى '. __("admin.$order->status"),
            'status'=>$order->status,
            'username'=>"رقم الطلب",
            'order_code'=>$order->code,
            'user_id'=>$order->user_id,
            "employee_type"=>Auth::user()->type_user!="1"?"0":"1",
            "employee_id"=>Auth::user()->id,
        ];
        broadcast(new EventUser($data))->toOthers();
        $data=[
            'order_id'=>$order->id,
            'messages'=>' تم تغير '.__("admin.status") .' الى '. __("admin.$order->status"),
            'type_order'=>$order->type_order==='service'?__("admin.services").'\ '.$order->service->name:__("admin.packages").'\ '.$order->package->name,
            'username'=>"رقم الطلب",
            'order_code'=>$order->code,
            "employee_type"=>Auth::user()->type_user!="1"?"0":"1",
            "employee_id"=>Auth::user()->id,
        ];
        broadcast(new MyEvent($data))->toOthers();
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
        return response()->json(['success'=>__("admin.updated successfully")]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($this->repositoryOrder->delete($order)){
            $assignedTask=AssignedTask::where('order_id',$order->id)->get();
            if($assignedTask!=null){
                $assignedTask->each->delete();
            }
            $packageArchive=PackageArchive::where('order_id',$order->id)->get();
            if($packageArchive){
                $packageArchive->each->delete();
            }
            $stock=Stock::where('order_id',$order->id)->get();
            if($stock!=null){
                $stock->each->delete();
            }
            if($order->file!=null){
                Storage::Disk()->Delete($order->file);
            }
        }
        return response()->json(['success'=>__("admin.deleted"),'id'=>$order->id]);
    }


    public function export($id)
    {
        $order=Order::find($id);
        $pdf = PDF::loadView('general-components.admin.invoice',compact('order'));
        return $pdf->download('invoice.pdf');
    }

    public function listOrderExport(){
        if(Order::first()!=null){
            return Excel::download(new ListOrderExport, 'listorders.xlsx');
        }else{
            return back()->withWarning(__("admin.not_found"));
        }
    }
}
