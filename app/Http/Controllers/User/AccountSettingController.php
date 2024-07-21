<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\{Order,Profile};

class AccountSettingController extends Controller
{
    public function index(){
        return view("user.pages.account.index",[
            'order_count'=>Order::where("user_id",Auth::user()->id)->get()->count(),
            'order_count_pending'=>Order::where("user_id",Auth::user()->id)->where("status",'pending')->get()->count(),
            'order_count_done'=>Order::where("user_id",Auth::user()->id)->where("status",'done')->get()->count(),
            'order_count_canceled'=>Order::where("user_id",Auth::user()->id)->where("status",'canceled')->get()->count(),
            'order_count_successful'=>Order::where("user_id",Auth::user()->id)->where("status",'successful')->get()->count(),
            'profile_count'=>Profile::where("user_id",Auth::user()->id)->get()->count(),
        ]);
    }
}
