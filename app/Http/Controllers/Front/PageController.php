<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Page $page)
    {
        return view("front.pages.page",[
            'page'=>$page
        ]);
    }

}
