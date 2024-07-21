<?php

namespace App\Http\Controllers\Admin;

use App\Events\EventUserAttach;
use App\Exports\ProfileExport;
use App\Http\Controllers\Controller;
use App\Models\{Profile,Attachment, Notice, User,Order, Package, Service};
use App\Http\Requests\User\StoreProfileRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\RepositoryInterface\ProfileInterface;
use Auth;
use Storage;
use App\Traties\{UploadFile,GetData};
use Maatwebsite\Excel\Facades\Excel;

class ProfileController extends Controller
{

    use UploadFile;
    use GetData;

    private $repositoryProfile;

    public function __construct(ProfileInterface $repositoryProfile)
    {
        $this->repositoryProfile=$repositoryProfile;
        $this->middleware('permission:profile-list', ['only' => ['index','show']]);
        $this->middleware('permission:profile-create', ['only' => ['create','store']]);
        $this->middleware('permission:profile-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:profile-delete', ['only' => ['destroy']]);
        $this->middleware('permission:profile-storeAttach', ['only' => ['storeAttach']]);
        $this->middleware('permission:profile-getorderUser', ['only' => ['getorderUser']]);
        $this->middleware('permission:profile-profileExport', ['only' => ['profileExport']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.profile.index",[
            'profile'=>$this->repositoryProfile->all(),
            'service'=>Service::all(),
            'package'=>Package::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("admin.pages.profile.create",[
            'user_id'=>$id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        $request->validated();
        $profile=$this->repositoryProfile->create($this->storeProfileByAdmin($request));
        if($request->has('file')){
            $profile->file=$this->uploadFile($request->file('file'),'/images/profiles/');
            $profile->save();
        }
        // $data=[
        //     'messages'=>'تم اضافه بروفيل جديد من قبل الادمن',
        //     'filed_name'=>$profile->code,
        //     'attchname'=>$profile->name,
        //     'user_id'=>$profile->user_id,
        // ];
        // broadcast(new EventUserAttach($data))->toOthers();
        // Notice::create([
        //     'messages'=>'تم اضافه بروفيل جديد من قبل الادمن',
        //     'filed_name'=>$profile->code,
        //     'attchname'=>$profile->name,
        //     'user_id'=>$profile->user_id,
        // ]);
        return redirect("dashborad/profiles/$request->user_id")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAttach(StoreOrderRequest $request)
    {
        $request->validated();
        $request->attachment_file=$this->uploadFile($request->file('attachment_file'),'/images/profiles/attachments/');
        $this->repositoryProfile->attachmentFile($this->getAttachmentTypeOrder($request,"App\Models\Profile"));
        // $data=[
        //     'filed_name'=>__("admin.profiles"),
        //     'attchname'=>__("admin.addedAttach"),
        //     'user_id'=>Profile::where("id",$request->order_id)->first()->user_id,
        // ];
        // broadcast(new EventUserAttach($data))->toOthers();
        return response()->json(['success'=>__("admin.added successfully")]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $Profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $order=Order::where('profile_id',$profile->id)->first();
        if($order!=null){
            return response()->json(['success'=>__('admin.can_not_dele'),'icon'=>'warning']);
        }else{
            if($this->repositoryProfile->delete($profile)){
                Storage::disk()->delete("/images/profiles/attachments/$profile->file");;
            }
            return response()->json(['success'=>__("admin.deleted"),'icon'=>'success','id'=>$profile->id]);
        }
    }


    public function getorderUser($id){
        return view("admin.pages.user.order",[
            'order'=>Order::where("profile_id",$id)->paginate(),
            'user'=>User::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view("admin.pages.profile.edit",[
            'profile'=>$profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateProfileRequest  $UpdateProfileRequest
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $request->validated();
        $this->repositoryProfile->update([
            'name'=>$request->name,
            'link'=>$request->link,
        ],$profile);
        if($request->has("file")){
            $profile->file=$this->uploadFileUpate($request->file('file'),'/images/profiles/',$profile->file);
            $profile->save();
        }
        return redirect("dashborad/profiles/$profile->id/edit")->withSuccess(__("admin.updated successfully"));
    }

    public function profileExport(){
        if(Profile::first()!=null){
            return Excel::download(new ProfileExport, 'profiles.xlsx');
        }else{
            return back()->withWarning(__("admin.not_found"));
        }
    }
}
