<?php

namespace App\Http\Controllers\User;

use App\Events\MyChat;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{

    public function getMessage()
    {
        $my_id = Auth::user()->id;

        
        if(User::where("type","admin")->where("chat_reply","1")->first()!=null){
            $user_id=User::where("type","admin")->where("chat_reply","1")->first()->id;
            // Make read all unread message
            Chat::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);
        
            // Get all message from selected user
            $messages = Chat::where(function ($query) use ($user_id, $my_id) {
                $query->where('from', $user_id)->where('to', $my_id);
            })->oRwhere(function ($query) use ($user_id, $my_id) {
                $query->where('from', $my_id)->where('to', $user_id);
            })->get();
            $message_check = Chat::where(function ($query) use ($user_id, $my_id) {
                $query->where('from', $user_id)->where('to', $my_id);
            })->oRwhere(function ($query) use ($user_id, $my_id) {
                $query->where('from', $my_id)->where('to', $user_id);
            })->first();
            if($message_check!=null){
                return view('user.pages.chat.messages', ['messages' => $messages]);
            }else{
                return view('user.pages.chat.messages', ['message' => __("admin.message_welcome")]);
            }
        }else{
            return view('user.pages.chat.messages', ['message' => __("admin.chat_not_replay")]);
        }
        
    }
    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = User::where("type","admin")->where("chat_reply","1")->first()->id;
        $message = $request->message;

        $data = new Chat();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();
        $data = ['from' => $from, 'to' => $to,'message'=>$message,'is_read'=>'0','created_at' => $data->created_at->diffForHumans()]; // sending from and to user id when pressed enter
        broadcast(new MyChat($data))->toOthers();
    }
}
