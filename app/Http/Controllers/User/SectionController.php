<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\SectionTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("user.pages.section.index",[
            'sections'=>SectionTitle::where("user_id",Auth::user()->id)->get(),
        ]);
    }
}
