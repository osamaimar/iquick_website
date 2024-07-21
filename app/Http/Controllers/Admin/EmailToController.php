<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Mail\SendMailAttach;
use App\Models\EmailTo;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traties\UploadFile;
class EmailToController extends Controller
{
    use UploadFile;

 
    public function __construct()
    {
        $this->middleware('permission:emailTo-create', ['only' => ['create','store']]);
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
            'email'             =>"nullable|email",
            'message'           =>"required|max:10000000",
            'attachment_file'   =>"|mimes:webp,jpg,png,pdf|max:500",
        ]);
        $emailTo = EmailTo::create([
            'email' => $request->email==null?$request->email_user:$request->email,
            'message' => $request->message,
            'user_id'=>Auth::user()->id
        ]);
        if($request->attachment_file!=null){
            $emailTo->file=$this->uploadFile($request->file('attachment_file'),'/images/contacts/attachments/');
            $emailTo->save();
            \Mail::to($emailTo->email)->send(new SendMailAttach($emailTo));
        }else{
            $emailTo->save();
            \Mail::to($emailTo->email)->send(new SendMail($emailTo));
        }
        
        return response()->json(['success'=>__("admin.have_Reply")]);
    }

}
