<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Attachment};
use App\Http\Requests\StoreAttachmentRequest;
use App\Http\Requests\UpdateAttachmentRequest;
use App\RepositoryInterface\{AttachmentInterface};
use Storage;
use App\Traties\{UploadFile,GetData,CheckImage};
class AttachmentController extends Controller
{

    use UploadFile;
    use GetData;
    use CheckImage;

    private $repositoryAttachment;

    public function __construct(AttachmentInterface $repositoryAttachment)
    {
        $this->repositoryAttachment=$repositoryAttachment;
        $this->middleware('permission:attachment-list', ['only' => ['index','show']]);
        $this->middleware('permission:attachment-create', ['only' => ['create','store']]);
        $this->middleware('permission:attachment-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:attachment-delete', ['only' => ['destroy']]);
        $this->middleware('permission:download-file', ['only' => ['download']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.attachment.index",[
            'attachment'=>$this->repositoryAttachment->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.attachment.create",[
            'order'=>$this->repositoryAttachment->allOrders(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttachmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttachmentRequest $request)
    {
        $request->validated();

        $this->checkType($request);
        
        return redirect("dashborad/attachments/create")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $attachment)
    {
        return view("admin.pages.attachment.edit",[
            'attachment'=>$attachment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttachmentRequest  $request
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttachmentRequest $request, Attachment $attachment)
    {
        if($attachment->attachmentable==null){
            return redirect("dashborad/attachments/$attachment->id/edit")->withWarning(__("admin.Warning"));
        }
        $this->checkFile($request,$attachment);
        return redirect("dashborad/attachments/$attachment->id/edit")->withSuccess(__("admin.updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        if($this->repositoryAttachment->delete($attachment)){
            if($attachment->file!=null){
                if(Storage::disk()->exists($attachment->file)){
                    Storage::disk()->Delete($attachment->file);
                }
            }
            
        }
        return response()->json(['success'=>__("admin.deleted"),'id'=>$attachment->id]);
    }


    public function download($file_name){
        if(Storage::disk()->exists('images/orders/attachments/'.$file_name)){

            $path=Storage::disk()->path('images/orders/attachments/'.$file_name);
            return response()->download($path);

        }elseif(Storage::disk()->exists('images/profiles/attachments/'.$file_name)){

            $path=Storage::disk()->path('images/profiles/attachments/'.$file_name);
            return response()->download($path);

        }elseif(Storage::disk()->exists('images/profiles/'.$file_name)){

            $path=Storage::disk()->path('images/profiles/'.$file_name);
            return response()->download($path);

        }elseif(Storage::disk()->exists('images/stockes/attachments/'.$file_name)){

            $path=Storage::disk()->path('images/stockes/attachments/'.$file_name);
            return response()->download($path);

        }
        return back()->withWarning(__("admin.not_found"));
    }


}
