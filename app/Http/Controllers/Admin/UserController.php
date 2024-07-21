<?php

namespace App\Http\Controllers\Admin;

use App\Events\EventUser;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\{AssignedTask, Notice, User,Profile,Order, Package, Service,PackageArchive};
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\RepositoryInterface\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use App\Traties\{UploadFile,GetData};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use GetData;
    use UploadFile;

    private $repositoryUser;

    public function __construct(UserInterface $repositoryUser)
    {
        $this->repositoryUser=$repositoryUser;
        $this->middleware('permission:user-list', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-getProfileUser', ['only' => ['getProfileUser']]);
        $this->middleware('permission:user-getOrderUser', ['only' => ['getOrderUser']]);
        $this->middleware('permission:user-getProfileHistory', ['only' => ['getProfileHistory']]);
        $this->middleware('permission:user-changeUserStatus', ['only' => ['changeUserStatus']]);
        $this->middleware('permission:user-orderToUser', ['only' => ['orderToUser']]);
        $this->middleware('permission:user-export',['only'=>['export']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.user.index",[
            'user'=>$this->repositoryUser->all(),
            'service'=>Service::all(),
            'package'=>Package::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.user.create',[
            'roles'=>Role::pluck('name','name')->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $request->validated();
        $user=$this->repositoryUser->create($this->storeUser($request));
        Profile::create([
            'name'=>__("admin.profile_pend"),
            'link'=>"https://iquick.eraasoft.com/",
            'user_id'=>$user->id,
            'code'=>mt_rand(1000000, 9999999),
            'status'=>"1"
        ]);
        if($user->type=="admin"){
            if($request->roles!=[]){
                $user->assignRole($request->input('roles'));
            }
        }
        return redirect("dashborad/users/create")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.pages.user.edit',[
            'user'=>$user,
            "roles"=>$roles,
            "userRole"=>$userRole,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $request->validated();
        $this->repositoryUser->update($this->updateUser($request,$user),$user);
        if($user->type=="admin"){
            if($request->roles!=[]){
                DB::table('model_has_roles')->where('model_id',$user->id)->delete();
                $user->assignRole($request->input('roles'));
            }
        }
        return redirect("dashborad/users/$user->id/edit")->withSuccess(__("admin.updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->type!="admin"){
            $order=Order::where('user_id',$user->id)->first();
            $profile=Profile::where('user_id',$user->id)->get();
            if($order!=null){
                return response()->json(['success'=>__('admin.can_not_dele'),'icon'=>'warning']);
            }else{
                $profile->each->delete();
                $this->repositoryUser->delete($user);
                return response()->json(['success'=>__("admin.deleted"),'icon'=>'success','id'=>$user->id]);           
            }
        }else{
            $assignedtask=AssignedTask::where('user_task_id',$user->id)->first();
            if($assignedtask!=null){
                return response()->json(['success'=>__('admin.can_not_dele'),'icon'=>'warning']);
            }else{
                $this->repositoryUser->delete($user);
                return response()->json(['success'=>__("admin.deleted"),'icon'=>'success','id'=>$user->id]);           
            }
        }
        
    }

    public function getProfileUser($id){
        return view("admin.pages.user.profile",[
            'profile'=>Profile::where("user_id",$id)->orderBy("id","desc")->paginate(),
            'user_id'=>$id
        ]);
    }

    public function getOrderUser($id){
        return view("admin.pages.user.order",[
            'order'=>Order::where("user_id",$id)->orderBy("status",'desc')->orderBy("id","desc")->paginate(),
            'user'=>User::where('type','admin')->get()
        ]);
    }


    public function getProfileHistory(User $user){
        return view("admin.pages.user.profile-history",[
            'order_count'=>Order::where("user_id",$user->id)->get()->count(),
            'order_count_pending'=>Order::where("user_id",$user->id)->where("status",'pending')->get()->count(),
            'order_count_done'=>Order::where("user_id",$user->id)->where("status",'done')->get()->count(),
            'order_count_canceled'=>Order::where("user_id",$user->id)->where("status",'canceled')->get()->count(),
            'order_count_successful'=>Order::where("user_id",$user->id)->where("status",'successful')->get()->count(),
            'profile_count'=>Profile::where("user_id",$user->id)->get()->count(),
        ]);
    }
    public function changeUserStatus(Request $request,User $user){
        $user->update([
            "status"=>$request->status,
        ]);
        return redirect("dashborad/users")->withSuccess(__("admin.updated successfully"));
    }

    public function orderToUser(Request $request){
        if ($request->service_id != null && $request->package_id!=null) {
            $request->validate([
                'description_cust'    =>'nullable|min:3|max:500000000',
                'file'                =>"nullable|mimes:webp,jpg,png,pdf|max:4025",
            ]);
            if($request->has('file')&&$request->file!=null){
                $request->file=$this->uploadFile($request->file('file'),'/images/orders/attachments/');
            }
            $service=Service::where('id',$request->service_id)->first();
            $user = User::where("id", $request->user_id)->first();
            Order::create($this->storeOrderByAdmin($request,$service,'service',$user));
            $package=Package::where('id',$request->package_id)->first();
            $order=Order::create($this->storeOrderByAdmin($request,$package,'package',$user));
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
        }elseif($request->package_id==null){
            $request->validate([
                'service_id'=>"required",
                'description_cust'    =>'nullable|min:3|max:5000',
                'file'                =>"nullable|mimes:webp,jpg,png,pdf|max:500",
            ]);
            if($request->has('file')&&$request->file!=null){
                $request->file=$this->uploadFile($request->file('file'),'/images/orders/attachments/');
            }
            $service=Service::where('id',$request->service_id)->first();
            $user = User::where("id", $request->user_id)->first();
            $order=Order::create($this->storeOrderByAdmin($request,$service,'service',$user));
        }elseif($request->service_id==null){
            $request->validate([
                'package_id'=>"required",
                'description_cust'    =>'nullable|min:3|max:5000',
                'file'                =>"nullable|mimes:webp,jpg,png,pdf|max:500",
            ]);
            if($request->has('file')&&$request->file!=null){
                $request->file=$this->uploadFile($request->file('file'),'/images/orders/attachments/');
            }
            $package=Package::where('id',$request->package_id)->first();
            $user = User::where("id", $request->user_id)->first();
            $order=Order::create($this->storeOrderByAdmin($request,$package,'package',$user));
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
        }
        $data2=[
            'order_id'=>$order->id,
            'messages'=>'تم اضافه طلب جديد من قبل الادمن',
            'status'=>$order->status,
            'username'=>"رقم الطلب",
            'order_code'=>$order->code,
            'user_id'=>$order->user_id,
            "employee_type"=>Auth::user()->type_user!="1"?"0":"1",
            "employee_id"=>Auth::user()->id,
        ];
        broadcast(new EventUser($data2))->toOthers();
        Notice::create([
            'order_id'=>$order->id,
            'messages'=>'تم اضافه طلب جديد من قبل الادمن',
            'order_status'=>$order->status,
            'user_name'=>"رقم الطلب",
            'order_code'=>$order->code,
            'user_id'=>$order->user_id,
            "employee_type"=>Auth::user()->type_user!="1"?"0":"1",
            "employee_id"=>Auth::user()->id,
        ]);
        return response()->json(['success'=>__("user.sent_order")]);
    }

    public function export() 
    {
        if(User::where("type","user")->first()!=null){
            return Excel::download(new UsersExport, 'users.xlsx');
        }else{
            return back()->withWarning(__("admin.not_found"));
        }
        
    }

}