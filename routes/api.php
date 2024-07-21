<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\User\AccountSettingController;
use App\Http\Controllers\Api\User\AttachmentController;
use App\Http\Controllers\Api\User\ChatController;
use App\Http\Controllers\Api\User\EditProfileController;
use App\Http\Controllers\Api\User\EventController;
use App\Http\Controllers\Api\User\NoticeController;
use App\Http\Controllers\Api\User\OrderController;
use App\Http\Controllers\Api\User\Package\PackageController;
use App\Http\Controllers\Api\User\ProfileController;
use App\Http\Controllers\Api\User\SectionController;
use App\Http\Controllers\Api\User\Service\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->group(function() {
    //pages profile
    Route::get('services',[ServiceController::class,'index'])->name("services");
    Route::get('packages',[PackageController::class,'index'])->name("packages");
    Route::get('account/setting',[AccountSettingController::class,'index'])->name("account/setting");
    Route::post('edit/profile',[EditProfileController::class,'editProfile'])->name("edit/profile");
    Route::put('change/password',[EditProfileController::class,'changePassword'])->name("change/password");
    Route::resource('profiles',ProfileController::class);
    Route::resource('orders',OrderController::class);
    Route::get('get/profile/id/{id}',[OrderController::class,'getProfileId'])->name("getprofileid");
    Route::post('serviceorders',[OrderController::class,'storeOrderService'])->name("serviceorders");
    Route::post('packageorders',[OrderController::class,'storeOrderPackage'])->name("packageorders");
    Route::post('order/rating/{order}',[OrderController::class,'rating'])->name('order/rating');
    Route::resource('events',EventController::class);
    Route::get('attachmentdownload/{file}',[AttachmentController::class,'download'])->name('download');
    Route::resource('sections',SectionController::class);
    Route::resource('chats',ChatController::class);
    Route::get('getMessage',[ChatController::class,'getMessage'])->name("getMessage");
    Route::post('sendMessage',[ChatController::class,'sendMessage'])->name("sendMessage");
    Route::get('search/service',[ServiceController::class,'searchService'])->name('search/service');
    Route::get('search/package',[PackageController::class,'searchPackage'])->name('search/package');
    Route::get('notice',[NoticeController::class,'index'])->name('notice');
    Route::get('events/export/data', [EventController::class, 'export'])->name("events/export/data");
    Route::get('orders/export/data', [OrderController::class, 'export'])->name("orders/export/data");
});

Route::group(['middleware' => 'api','namespace' => 'App\Http\Controllers','prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
});