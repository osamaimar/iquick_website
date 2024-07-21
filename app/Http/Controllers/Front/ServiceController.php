<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = (request()->input('search') != null) ? request()->input('search') : null;
        $services = Service::where("status",'1')->where('name','LIKE', '%'.$search.'%')->orderBy("id","Desc")->get();

        return view("front.pages.services",[
            'services'=> $services,
        ]);
    }
}
