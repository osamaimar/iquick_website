<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\User\ThemeController;
use Illuminate\Support\Facades\Route;

include("admin.php");
include("user.php");
include("front.php");

// use Illuminate\Support\Facades\Mail;
// use App\Models\Contact;
// Route::get('send-mail', function () {

//     $emails=Contact::chunk(50,function($data){
//         dispatch(new App\Jobs\SendMail($data));
//     });
  
//     dd('done');
// });

