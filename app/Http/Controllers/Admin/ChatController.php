<?php

namespace App\Http\Controllers\Admin;

use App\Events\MyChat;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:chat-list', ['only' => ['index','show','sendMessage','getMessage']]);
        $this->middleware('permission:chat-chatReply', ['only' => ['chatReply']]);
    }
    public function index()
    {
        if(Auth::user()->chat_reply=="1"){
            $users = DB::select("select users.id,uspro.profile_image, users.firstname,users.lastname,users.updated_at, users.email, count(is_read) as unread 
            from users 
            LEFT  JOIN  user_profiles as uspro ON users.id = uspro.user_id
            LEFT  JOIN  chats ON users.id = chats.from and is_read = 0 and chats.to = " . Auth::user()->id . "
            where users.id != " . Auth::user()->id . " and users.type='user'
            group by users.id, users.firstname,users.lastname,uspro.profile_image, users.updated_at, users.email ORDER BY users.updated_at Desc");
    
        }else{
            $users = [];
        }
        
        return view('admin.pages.chat.index', ['users' => $users]);

    }
    public function getMessage($user_id)
    {
        $my_id = Auth::user()->id;

        // Make read all unread message
        Chat::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);
       
        // Get all message from selected user
        $messages = Chat::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();
       
        $username=User::where("id",$user_id)->first();
        $image_user=UserProfile::where("user_id",$username->id)->first();
        if($image_user!=null){
            $image_user=$image_user->profile_image;
        }else{
            $image_user=null;
        }

        return view('admin.pages.chat.messages', ['messages' => $messages,'username'=>$username->firstname.' '.$username->lastname,'image_user'=>$image_user,'to'=>$my_id]);
    }
    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
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

    public function chatReply(Request $request){
        User::where("id",Auth::user()->id)->first()->update([
            'chat_reply'=>$request->chat_reply,
        ]);
        return response()->json(['success'=>__("admin.updated successfully")]);
    }
}
