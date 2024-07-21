<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\RepositoryInterface\{AboutInterface};
use Storage;
use App\Traties\{UploadFile,GetData,CheckImage};
class AboutController extends Controller
{

    use UploadFile;
    use GetData;
    use CheckImage;

    private $repositoryAbout;

    public function __construct(AboutInterface $repositoryAbout)
    {
        $this->repositoryAbout=$repositoryAbout;
        $this->middleware('permission:about-list', ['only' => ['index','show']]);
        $this->middleware('permission:about-create', ['only' => ['create','store']]);
        $this->middleware('permission:about-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:about-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect("dashborad/abouts/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $about=$this->repositoryAbout->first();
        if($about == null):
            return view('admin.pages.about.create');
        else:
            return redirect("dashborad/abouts/$about->id/edit");
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutRequest $request)
    {
        $request->validated();
        $this->storeImage($request);
        $this->repositoryAbout->create($this->getAboutStore($request));
        return redirect("dashborad/abouts")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.pages.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        $request->validated();
        $this->checkImage($request,$about);
        $this->repositoryAbout->update($this->getAbout($request,$about),$about);
        return redirect("dashborad/abouts/$about->id/edit")->withSuccess(__("admin.updated successfully"));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        if($this->repositoryAbout->delete($about)){
            $destination="/images/abouts/";
            Storage::disk()->delete($destination.$about->image1);
            Storage::disk()->delete($destination.$about->image2);
            Storage::disk()->delete($destination.$about->image3);
            Storage::disk()->delete($destination.$about->image4);
        }
        return response()->json(['success'=>__("admin.deleted"),'id'=>$about->id]);
    }
}
