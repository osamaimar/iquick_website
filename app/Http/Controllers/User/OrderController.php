<?php

namespace App\Http\Controllers\user;

use App\Events\EventUser;
use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Notice, Order,Service,Package,Profile,PackageArchive};
use App\Http\Requests\User\StoreOrderRequest;
use Auth;
use Storage;
use App\Traties\{UploadFile,GetData};
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{

    use UploadFile;
    use GetData;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $profile_id=session()->get('profile_id');
        return view("user.pages.order.index",[
            'order'=>Order::where('user_id',Auth::user()->id)
            ->where('profile_id',$profile_id)->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view("user.pages.order.attachment",[
            'order'=>$order,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrderService(StoreOrderRequest $request)
    {
        $request->validated();
        if($request->has('file')&&$request->file!=null){
            $request->file=$this->uploadFile($request->file('file'),'/images/orders/attachments/');
        }
        $service=Service::where('id',$request->service_id)->first();
        $order=Order::create($this->storeOrderServiceUser($request,$service));
        $data=[
            'order_id'=>$order->id,
            'messages'=>'تم اضافه طلب جديد',
            'type_order'=>__("admin.services").'\ '.$service->name,
            'username'=>"رقم الطلب",
            'order_code'=>$order->code,
            "employee_type"=>"0",
            "employee_id"=>null
        ];
        broadcast(new MyEvent($data))->toOthers();
        $data2=[
            'order_id'=>$order->id,
            'messages'=>'تم اضافه طلب جديد',
            'status'=>$order->status,
            'username'=>"رقم الطلب",
            'order_code'=>$order->code,
            'user_id'=>$order->user_id,
            "employee_type"=>"0"
        ];
        broadcast(new EventUser($data2))->toOthers();
        Notice::create([
            'order_id'=>$order->id,
            'messages'=>'تم اضافه طلب جديد',
            'order_status'=>$order->status,
            'user_name'=>"رقم الطلب",
            'order_code'=>$order->code,
            'user_id'=>$order->user_id,
            "employee_type"=>"0"
        ]);
        return response()->json([
            'success'=>__("user.sent_order"),
            'order' => $order,
        ]);
    }

    public function storeOrderPackage(StoreOrderRequest $request)
    {
        $request->validated();
        if($request->has('file')&&$request->file!=null){
            $request->file=$this->uploadFile($request->file('file'),'/images/orders/attachments/');
        }
        $package=Package::where('id',$request->package_id)->first();
        $order=Order::create($this->storeOrderPackageUser($request,$package));
        if($package->services){
            foreach($package->services as $key=>$service){
                PackageArchive::updateOrInsert(
                    ['service_id'=>$service->id,'order_id'=>$order->id],
                    [
                        "service_name"=>$service->name,
                        "service_id"=>$service->id,
                        "package_id"=>$order->package->id,
                        "order_id"=>$order->id,
                    ],
                );
            };
        }
        $data=[
            'order_id'=>$order->id,
            'messages'=>'تم اضافه طلب جديد',
            'type_order'=>__("admin.packages").'\ '.$package->name,
            'username'=>"رقم الطلب",
            'order_code'=>$order->code,
            "employee_type"=>"0",
            "employee_id"=>null
        ];
        broadcast(new MyEvent($data))->toOthers();
        $data2=[
            'order_id'=>$order->id,
            'messages'=>'تم اضافه طلب جديد',
            'status'=>$order->status,
            'username'=>"رقم الطلب",
            'order_code'=>$order->code,
            'user_id'=>$order->user_id,
            "employee_type"=>"0"
        ];
        broadcast(new EventUser($data2))->toOthers();
        Notice::create([
            'order_id'=>$order->id,
            'messages'=>'تم اضافه طلب جديد',
            'order_status'=>$order->status,
            'user_name'=>"رقم الطلب",
            'order_code'=>$order->code,
            'user_id'=>$order->user_id,
            "employee_type"=>"0"
        ]);
        return response()->json([
            'success'=>__("user.sent_order"),
            'order' => $order,
        ]);
    }


    public function getProfileId($profile){
        session()->put('profile_id' , $profile);
        return back();
    }

    public function rating(Request $request,Order $order){
        $order->rating = $request->input('star');
        $order->save();
        return redirect()->back();
    }

    public function export($id)
    {
        $order=Order::find($id);
        $pdf = Pdf::loadView('general-components.admin.invoice',compact('order'));
        return $pdf->download('invoice.pdf');
    }
    
}
