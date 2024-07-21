<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\{Attachment,Order};
use Auth;
use Storage;
use Response;
class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=Order::where('user_id',Auth::user()->id)->get();
        $attachment=[];
        foreach($order as $ord){
            $attachment[]=Attachment::where('attachmentable_id',$ord->id)->get();
        }
        return view("user.pages.attachment.index",[
            'attachment'=>$attachment,
            'order'=>$order
        ]);
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

        }elseif(Storage::disk()->exists('images/sections/'.$file_name)){

            $path=Storage::disk()->path('images/sections/'.$file_name);
            return response()->download($path);

        }
        return back()->withWarning(__("admin.not_found"));
    }

}
