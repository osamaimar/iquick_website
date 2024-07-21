<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("front.index",[
            'services'=> Service::where("status",'1')->orderBy("id","Desc")->take(4)->get(),
            'packages'=> Package::orderBy("id","Desc")->get(),
        ]);
    }
}
