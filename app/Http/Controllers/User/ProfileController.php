<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Requests\User\{StoreProfileRequest,UpdateProfileRequest};
use App\Models\Order;
use App\Models\SectionTitle;
use Illuminate\Http\Request;
use App\RepositoryInterface\ProfileInterface;
use Auth;
use Storage;
use App\Traties\{UploadFile,GetData};
class ProfileController extends Controller
{

    use UploadFile;
    use GetData;

    private $repositoryProfile;

    public function __construct(ProfileInterface $repositoryProfile)
    {
        $this->repositoryProfile=$repositoryProfile;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("user.pages.profiles.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.pages.profiles.create");
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
        $profile=$this->repositoryProfile->create($this->storeProfile($request));
        if($request->has('file')){
            $profile->file=$this->uploadFile($request->file('file'),'/images/profiles/');
            $profile->save();
        }
        return redirect("profile/profiles/create")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view("user.pages.profiles.attachment",[
            'profile'=>$profile,
            'orders'=>Order::where("profile_id",$profile->id)->where("user_id",Auth::user()->id)->where("type_order","package")->get(),
            'order_count'=>Order::where("user_id",Auth::user()->id)->where("profile_id",$profile->id)->get()->count(),
            'order_count_pending'=>Order::where("user_id",Auth::user()->id)->where("status",'pending')->where("profile_id",$profile->id)->get()->count(),
            'order_count_done'=>Order::where("user_id",Auth::user()->id)->where("status",'done')->where("profile_id",$profile->id)->get()->count(),
            'order_count_canceled'=>Order::where("user_id",Auth::user()->id)->where("status",'canceled')->where("profile_id",$profile->id)->get()->count(),
            'order_count_successful'=>Order::where("user_id",Auth::user()->id)->where("status",'successful')->where("profile_id",$profile->id)->get()->count(),
            'profile_count'=>Profile::where("user_id",Auth::user()->id)->get()->count(),
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
        return view("user.pages.profiles.edit",[
            'profile'=>$profile,
            'sections'=>SectionTitle::where("user_id",Auth::user()->id)->where("profile_id",session()->get('profile_id'))->get(),
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
        $this->repositoryProfile->update($this->updateProfile($request),$profile);
        if($request->has("file")){
            $profile->file=$this->uploadFileUpate($request->file('file'),'/images/profiles/',$profile->file);
            $profile->save();
        }
        return redirect("profile/profiles/$profile->id/edit")->withSuccess(__("admin.updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        if($this->repositoryProfile->delete($profile)){
            Storage::disk()->delete("/images/profiles/$profile->file");
        }
        return response()->json(['success'=>__("admin.deleted"),'id'=>$profile->id]);
    }

    // public function registerProfile(){
    //     $profile=Profile::create([
    //         'name'=>'profile pend',
    //         'link'=>"http://127.0.0.1:8000/home",
    //         'user_id'=>Auth::user()->id,
    //         'code'=>mt_rand(1000000, 9999999),
    //         'status'=>"1"
    //     ]);
    //     session()->put('profile_id' , $profile->id);
    //     return redirect()->route("user.profile");
    // }
    // public function registerProfileStore(StoreProfileRequest $request)
    // {
    //     $request->validated();
    //     $profile=$this->repositoryProfile->create($this->storeProfile($request));
    //     if($request->has('file')){
    //         $profile->file=$this->uploadFile($request->file('file'),'/images/profiles/');
    //         $profile->save();
    //     }
    //     session()->put('profile_id' , $profile->id);
    //     return redirect("profile/profiles/create")->withSuccess(__("admin.added successfully"));
    // }

    // public function registerProfileView(){
    //     return view("user.pages.profiles.register");
    // }

}
