<?php

namespace App\Http\Controllers\Front;

use App\Events\MyChat;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
class ChatController extends Controller
{

    public function getMessage()
    {
        if(User::where("type","admin")->where("chat_reply","1")->first()!=null){
            if(Auth::check()&&Auth::user()->type=="user"){
                $my_id = Auth::user()->id;
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
                return view('user.pages.chat.messages', ['message' => __("admin.send_email")]);
            }
        }else{
            return view('user.pages.chat.messages', ['message' => __("admin.chat_not_replay")]);
        }
    }
    public function sendMessage(Request $request)
    {
        if(User::where("type","admin")->where("chat_reply","1")->first()!=null){
            if(Auth::check()){
                if(Auth::user()->type=="user"){
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
            }else{
                $email=['email'=>$request->message];
                $validator = Validator::make($email,[
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                ]);
                if ($validator->fails()) {
                    
                }else{
                    $user=User::create([
                        'firstname' => __("messages.firstname"),
                        'lastname' => __("messages.lastname"),
                        'email' => $request->message,
                        'password' => Hash::make(123456789),
                        'code'=>mt_rand(1000000, 9999999)
                    ]);
                    $profile=Profile::create([
                        'name'=>__("admin.profile_pend"),
                        'link'=>"https://iquick.eraasoft.com/",
                        'user_id'=>$user->id,
                        'code'=>mt_rand(1000000, 9999999),
                        'status'=>"1"
                    ]);
                    Auth::login($user,true);
                    $from= User::where("type","admin")->where("chat_reply","1")->first()->id;
                    $to = $user->id;
                    $message = __("admin.password").' : '.'123456789';
                    $message_1 = __("admin.message_welcome");
                    $data1 = new Chat();
                    $data1->from = $from;
                    $data1->to = $to;
                    $data1->is_read = 0;
                    $data1->message = $message_1;
                    $data1->save();
                    $data1 = ['from' => $user->id, 'to' => $to,'message'=>$message_1,'is_read'=>'0','created_at' => now()->diffForHumans()]; // sending from and to user id when pressed enter
                    broadcast(new MyChat($data1))->toOthers();
                    $data = new Chat();
                    $data->from = $from;
                    $data->to = $to;
                    $data->message = $message;
                    $data->is_read = 0; // message will be unread when sending message
                    $data->save();
                    $data = ['from' => $user->id, 'to' => $to,'message'=>$message,'is_read'=>'0','created_at' => now()->diffForHumans()]; // sending from and to user id when pressed enter
                    broadcast(new MyChat($data))->toOthers();
                }
            }
        }
    }
}
