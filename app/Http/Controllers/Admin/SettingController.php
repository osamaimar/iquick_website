<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\RepositoryInterface\{SettingInterface};
use Storage;
use App\Traties\{UploadFile,GetData,CheckImage};
class SettingController extends Controller
{

    use UploadFile;
    use GetData;
    use CheckImage;

    private $repositorySetting;

    public function __construct(SettingInterface $repositorySetting)
    {
        $this->repositorySetting=$repositorySetting;
        $this->middleware('permission:setting-list', ['only' => ['index','show']]);
        $this->middleware('permission:setting-create', ['only' => ['create','store']]);
        $this->middleware('permission:setting-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:setting-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect("dashborad/settings/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting=$this->repositorySetting->first();
        if($setting == null):
            return view('admin.pages.setting.create');
        else:
            return redirect("dashborad/settings/$setting->id/edit");
        endif;
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request)
    {
        $request->validated();
        $this->storeImgaeSetting($request);
        $this->repositorySetting->create($this->getSetting($request));
        return redirect("dashborad/settings")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.pages.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $request->validated();
        $this->updateImgaeSetting($request,$setting);
        $this->repositorySetting->update($this->getSettingUpdate($request,$setting),$setting);
        return redirect("dashborad/settings")->withSuccess(__("admin.updated successfully")); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        if($this->repositorySetting->delete($setting)){
            $destination="/images/settings/";
            Storage::disk()->delete($destination.'header_logo/'.$setting->header_logo);
            Storage::disk()->delete($destination.'footer_logo/'.$setting->footer_logo);
            Storage::disk()->delete($destination.'icon/'.$setting->icon);
        }
        return response()->json(['success'=>__("admin.deleted"),'id'=>$setting->id]);
    }
}
