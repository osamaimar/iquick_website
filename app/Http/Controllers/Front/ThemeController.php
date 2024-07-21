<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ThemeController extends Controller
{
    public function mode(){
        setcookie("mode_front","dark",time()+360*360*60,"/");
        if(isset($_COOKIE['mode_front']) && $_COOKIE['mode_front']=="dark"){
            setcookie("mode_front","ligth",time()+360*360*60,"/");
        }
        return back();
    }
}
