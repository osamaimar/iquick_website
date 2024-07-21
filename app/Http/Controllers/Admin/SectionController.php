<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Section;
use App\Models\SectionTitle;
use App\Models\User;
use App\Traties\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{

    use UploadFile;
    public function __construct()
    {
        $this->middleware('permission:section-list', ['only' => ['index','show']]);
        $this->middleware('permission:section-create', ['only' => ['create','store']]);
        $this->middleware('permission:section-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:section-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.section.index",[
            'sections'=>SectionTitle::orderBy("id","desc")->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.section.create",[
            'users'=>User::where("type","user")->get()
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
            'title'=>"required|min:3|max:25",
            'user_id'=>"required|",
            'file.*'=>'nullable|mimes:webp,jpg,png,jpeg,pdf,xlsx|max:6000',
            'description.*'=>'nullable|min:3|max:1000000',
            'small_title.*'=>'nullable|min:3|max:25'
        ]);
        $sectionTitle=SectionTitle::create([
            'title'=>$request->title,
            'user_id'=>$request->user_id,
            'profile_id'=>$request->profile_id
        ]);
        //dd($sectionTitle->title);
        if($request->has("small_title") && $request->small_title!=null ||$request->has("description") && $request->description!=null ||$request->has("file") && $request->file!=null){
            $descriptions=$request->description;
            
            foreach($descriptions as $key=>$description){
                if(isset($request->file[$key])){
                    $file=$this->uploadFile($request->file('file')[$key],'/images/sections/');
                }else{
                    $file=null;
                }
                DB::table('sections')->updateOrInsert(
                    ['small_title'=>$request,"title_id"=>$sectionTitle->id],
                    [
                        "description"=>$description,
                        "small_title"=>$request->small_title[$key],
                        "file"=>$file!=null ? $file : ''
                    ],
                );
            };
        }
        
        // if($request->has('file')){
        //     $section->file=$this->uploadFile($request->file('file'),'/images/sections/');
        //     $section->save();
        // }
        return redirect("dashborad/sections/create")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sectionTitle=SectionTitle::where("id",$id)->first();
        return view("admin.pages.section.edit",[
            'users'=>User::where("type","user")->get(),
            'section'=>$sectionTitle
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sectionTitle=SectionTitle::where("id",$id)->first();
        $request->validate([
            'title'=>"required|min:3|max:25",
            'user_id'=>"required|",
            'file.*'=>'nullable|mimes:webp,jpg,png,jpeg,pdf,xlsx|max:6000',
            'description.*'=>'nullable|min:3|max:1000000',
            'small_title.*'=>'nullable|min:3|max:25'
        ]);
        $sectionTitle->update([
            'title'=>$request->title,
            'user_id'=>$request->user_id,
            'profile_id'=>$request->profile_id
        ]);
        //dd($sectionTitle->title);
        if($request->has("small_title") && $request->small_title!=null ||$request->has("description") && $request->description!=null ||$request->has("file") && $request->file!=null){
            $descriptions=$request->description;
            
            foreach($descriptions as $key=>$description){
                if(isset($request->file[$key])){
                    $file=$this->uploadFile($request->file('file')[$key],'/images/sections/');
                }else{
                    $file=null;
                }
                DB::table('sections')->updateOrInsert(
                    ['small_title'=>$request,"title_id"=>$sectionTitle->id],
                    [
                        "description"=>$description,
                        "small_title"=>$request->small_title[$key],
                        "file"=>isset($file) ? $file : ''
                    ],
                );
            };
        }
        // if($request->has("file")){
        //     $section->file=$this->uploadFileUpate($request->file('file'),'/images/sections/',$section->file);
        //     $section->save();
        // }
        return redirect("dashborad/sections/$sectionTitle->id/edit")->withSuccess(__("admin.updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sectionTitle=SectionTitle::where("id",$id)->first();
        if($sectionTitle->delete()){
            $section=Section::where("title_id",$sectionTitle->id)->get();
            $section->each->delete();
        }
        
        return response()->json(['success'=>__("admin.deleted"),'icon'=>'success','id'=>$sectionTitle->id]);
    }

    public function getProfileSection($id){
        $profile=Profile::where('user_id',$id)->get();
        return response()->json($profile);
    }
}
