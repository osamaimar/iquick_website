<?php
use  App\Http\Controllers\Front\{ChatController, ContactController, HomeController, PackageController, PageController, ServiceController};
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;

Route::get('/services', [ServiceController::class,'index'])->name('service');
Route::get('/services/{id}',[ServiceController::class,'getDetails'])->name('get.details.services');
Route::get('/packages/{id}',[PackageController::class,'getDetails'])->name('get.details.packages');

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){


    Route::get('/', function () {
        return redirect("home");
    });

    //pages
    Route::get('/home',[HomeController::class,'index'])->name('home');
    // Route::get('/services', [ServiceController::class,'index'])->name('service');
    Route::get('/package',[PackageController::class,'index'])->name('package');
    Route::get('/login', function () {
        if(Auth::check()){
            return redirect("home");
        }else{
            return view('front.pages.auth.login');
        }
    })->name('login');
    Route::get('/register', function () {
        if(Auth::check()){
            return redirect("home");
        }else{
            return view('front.pages.auth.register');
        }
    })->name('register');
    Route::get('/pages/{page}',[PageController::class,'index'])->name('page');
    Route::post('/contactstore', [ContactController::class,'store'])->name('contactstore');

    Route::get('get/message',[ChatController::class,'getMessage'])->name("get/message");
    Route::post('send/message',[ChatController::class,'sendMessage'])->name("send/Message");
    Route::post('search/services',[ServiceController::class,'searchService'])->name('search/services');
    Route::post('search/packages',[PackageController::class,'searchPackage'])->name('search/packages');

});

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

Route::get('/link/storage', function () {
    Artisan::call('migrate:fresh --seed');
    Artisan::call('optimize');
    $file_path2 = public_path("storage");
    if(File::exists($file_path2)) File::deleteDirectory($file_path2);
    Artisan::call('storage:link');
    return "success";
});


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
});


