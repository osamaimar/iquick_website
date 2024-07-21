<?php


use App\Http\Controllers\User\{AccountSettingController,AttachmentController, ChatController, EventController,ThemeController,EditProfileController,OrderController,ProfileController, SectionController, StockController};
use App\Http\Livewire\User\SearchOrder;
use App\Http\Controllers\User\Service\ServiceController;
use App\Http\Controllers\User\Package\PackageController;
use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CommentServiceController;

Route::middleware('user')->prefix('profile')->name('user.')->group(function() {
    //pages profile
    Route::get('profile',[ThemeController::class,'index'])->name('profile');
    Route::get('dark',[ThemeController::class,'mode'])->name("dark");
    Route::resource('userprofiles',EditProfileController::class);
    Route::get('change',[EditProfileController::class,'change'])->name("change");
    Route::put('change/password/{user}',[EditProfileController::class,'changePassword'])->name("change/password");
    Route::resource('orders',OrderController::class);
    Route::get('get/profile/id/{id}',[OrderController::class,'getProfileId'])->name("getprofileid");
    Route::post('serviceorders',[OrderController::class,'storeOrderService'])->name("serviceorders");
    Route::post('packageorders',[OrderController::class,'storeOrderPackage'])->name("packageorders");
    Route::get('order',[SearchOrder::class,'render'])->name("order");
    Route::resource('profiles',ProfileController::class);
    // Route::get('register/profile',[ProfileController::class,'registerProfile'])->name('register/profile');
    // Route::post('register/profile/store',[ProfileController::class,'registerProfileStore'])->name('register/profile/store');
    // Route::get('register/profile/view',[ProfileController::class,'registerProfileView'])->name('register/profile/view');
    Route::resource('events',EventController::class);
    Route::resource('attachments',AttachmentController::class);
    Route::get('attachmentdownload/{file}',[AttachmentController::class,'download'])->name('download');
    Route::get('services',[ServiceController::class,'index'])->name("services");
    Route::get('packages',[PackageController::class,'index'])->name("packages");
    Route::get('account/setting',[AccountSettingController::class,'index'])->name("account/setting");
    Route::post('order/rating/{order}',[OrderController::class,'rating'])->name('order/rating');
    Route::resource('stocks',StockController::class);
    Route::resource('sections',SectionController::class);
    Route::resource('chats',ChatController::class);
    Route::get('getMessage',[ChatController::class,'getMessage'])->name("getMessage");
    Route::post('sendMessage',[ChatController::class,'sendMessage'])->name("sendMessage");
    Route::post('events/export/data', [EventController::class, 'export'])->name("events/export/data");
    Route::get('/exportinvoice/{invoice}',[OrderController::class,'export'])->name("export");
    Route::post('storecommentservice',[CommentServiceController::class,'store']);
});
    // payment service
    Route::middleware('user')->get('payment/service/{id}',[PayPalController::class,'showinvoice'])->name('create.payment');
    Route::middleware('user')->get('handle-payment/{id}', [PayPalController::class,'handlePayment'])->name('make.payment');
    // Route::get('payment-success', [PayPalController::class,'paymentSuccess'])->name('success.payment');
    
    // payment packeges
    Route::middleware('user')->get('payment/packeges/{id}',[PayPalController::class,'showinvoicespackeges'])->name('create.payment.packeges');