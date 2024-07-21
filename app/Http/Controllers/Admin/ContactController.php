<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\RepositoryInterface\ContactInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\{Reply,ReplyAttach};
use App\Models\Setting;
use PDF;
use Storage;
use App\Traties\UploadFile;
class ContactController extends Controller
{

    use UploadFile;

    private $repositoryContact;

    public function __construct(ContactInterface $repositoryContact)
    {
        $this->repositoryContact=$repositoryContact;
        $this->middleware('permission:contact-list', ['only' => ['index','show']]);
        $this->middleware('permission:contact-create', ['only' => ['create','store']]);
        $this->middleware('permission:contact-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Setting::first()==null){
            return redirect("dashborad/settings")->withWarning(__("admin.type_email"));
        }
        return view("admin.pages.contact.index",[
            'contact'=>$this->repositoryContact->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'reply_text'=>"required|max:10000000",
            'attachment_file'   =>"|mimes:webp,jpg,png,pdf|max:500",
        ]);
        $contact=Contact::where("id",$request->contact_id)->first();
        $contact->status='1';
        $contact->reply=$request->reply_text;
        if($request->attachment_file!=null){
            $contact->file=$this->uploadFile($request->file('attachment_file'),'/images/contacts/attachments/');
            $contact->save();
            \Mail::to($contact->email)->send(new ReplyAttach($contact));
        }else{
            $contact->save();
            \Mail::to($contact->email)->send(new Reply($contact));
        }
        
        return response()->json(['success'=>__("admin.have_Reply")]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        if($this->repositoryContact->delete($contact)){
            if($contact->file!=null){
                Storage::disk()->delete('images/contacts/attachments/'.$contact->file);
            }
        }
        return response()->json([
            'success' => __("admin.deleted"),
            'id'      =>  $contact->id
        ]);
    }
}
