<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $search = (request()->input('search') != null) ? request()->input('search') : null;
        $packages = Package::where('name','LIKE', '%'.$search.'%')->orderBy("id","Desc")->get();

        return view("front.pages.packages",[
            'packages'=> $packages,
        ]);
    }
}
