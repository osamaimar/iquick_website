<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traties\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    use UploadFile;

    public function __construct()
    {
        $this->middleware('permission:slider-list', ['only' => ['index','show']]);
        $this->middleware('permission:slider-create', ['only' => ['create','store']]);
        $this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.slider.index",[
            "sliders"=>Slider::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.slider.create");
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
            "image"=>"required"
        ]);
        Slider::create([
            "image"=>$this->uploadFile($request->file('image'),'/images/sliders/')
        ]);
        return redirect("dashborad/sliders/create")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view("admin.pages.slider.edit",[
            "slider"=>$slider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            "image"=>"nullable"
        ]);
        $slider->update([
            "image"=>$request->image!=null?$this->uploadFileUpate($request->file('image'),'/images/sliders/',$slider->image):$slider->image
        ]);
        return redirect("dashborad/sliders/$slider->id/edit")->withSuccess(__("admin.updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        Storage::disk()->delete('/images/sliders/'.$slider->image);
        return response()->json(['success'=>__("admin.deleted"),'icon'=>'success','id'=>$slider->id]);
    }
}
