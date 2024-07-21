<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Http\Controllers\Admin\{RoleControlle,EmailToController,PackageArchiveController,AssignedTaskController,ProfileController,EventController,CalendarController,UserController,ThemeController,AboutController,AttachmentController, ChatController, ContactController,OrderController,PageController, SectionController, SettingController, StatusController, StockController,SliderController};

use App\Http\Livewire\Admin\{Search,SearchAttachment,SearchPackage,SearchService,SearchUser};

Auth::routes();

Route::middleware('admin')->prefix('dashborad')->name('admin.')->group(function() {

    //pages dashborad
    Route::get('dash',[ThemeController::class,'index'])->name('dash');
    Route::resource('email/to',EmailToController::class);
    Route::resource('/roles', RoleControlle::class);
    Route::resource('users',UserController::class);
    Route::post('order/to/user/',[UserController::class,'orderToUser'])->name("order/to/user/");
    Route::put('change/status/user/{user}',[UserController::class,'changeUserStatus'])->name("change/status/user/");
    Route::get('profile/history/{user}',[UserController::class,'getProfileHistory'])->name('profile/history');
    Route::get('get/profile/user/{user}',[UserController::class,'getProfileUser'])->name("get/profile/user");
    Route::resource('abouts',AboutController::class);
    Route::resource('attachments',AttachmentController::class);
    Route::resource('orders',OrderController::class);
    Route::get('list/order',[OrderController::class,'listOrder'])->name("list/order");
    Route::get('get/order/user/{user}',[UserController::class,'getOrderUser'])->name("get/order/user");
    Route::resource('profiles',ProfileController::class);
    Route::get('get/order/profile/{profile}',[ProfileController::class,'getorderUser'])->name('get/order/profile');
    Route::post('store/attach/profile',[ProfileController::class,'storeAttach'])->name('store/attach/profile');
    Route::get('/exportinvoice/{invoice}',[OrderController::class,'export'])->name("export");
    Route::resource('contacts',ContactController::class);
    Route::resource('pages',PageController::class);
    Route::resource('settings',SettingController::class);
    Route::resource('services',ServiceController::class);
    Route::resource('packages',PackageController::class);
    Route::resource('package/archives',PackageArchiveController::class);
    Route::get('get/package/service/{package_id}',[PackageController::class,'getService'])->name('get/package/service');
    Route::get('service/package/{package_id}/{service_id}',[PackageController::class,'deleteService'])->name('deleteservice');
    Route::get('dark',[ThemeController::class,'mode'])->name("dark");
    Route::get('search',[Search::class,'render'])->name("search");
    Route::get('service',[SearchService::class,'render'])->name("service");
    Route::get('order',[Search::class,'render'])->name("order");
    Route::get('package',[SearchPackage::class,'render'])->name("package");
    Route::get('attachment',[SearchAttachment::class,'render'])->name("attachment");
    Route::get('user',[SearchUser::class,'render'])->name("user");
    Route::get('getProfile/{user}',[CalendarController::class,'getProfile'])->name("getProfile");
    Route::get('getProfile/section/{user}',[SectionController::class,'getProfileSection'])->name("getProfile/section");
    Route::get('calendar-event', [CalendarController::class, 'index']);
    Route::post('calendar-crud-ajax', [CalendarController::class, 'calendarEvents']);
    Route::post('calendar-crud-ajax-update', [CalendarController::class, 'update']);
    Route::post('calendar-crud-ajax-delete', [CalendarController::class, 'destroy']);
    Route::post('calendar-crud-update', [CalendarController::class, 'calendarEventsUpdate']);
    Route::resource('calendars',CalendarController::class);
    Route::get('user/calendar',[CalendarController::class,'userCalendar']);
    Route::resource('events',EventController::class);
    Route::resource('assignedtasks',AssignedTaskController::class);
    Route::get('get/all/assign',[AssignedTaskController::class,'allAssign'])->name("get/all/assign");
    Route::get('assignedtasks/editdate/{id}/{type}',[AssignedTaskController::class,'editTask'])->name('assignedtasks/editdate');
    Route::get('attachmentdownload/{file}',[AttachmentController::class,'download'])->name('download');
    Route::resource('stocks',StockController::class);
    Route::resource('status',StatusController::class);
    Route::put('change/status/status/{status}',[StatusController::class,'changeStatus'])->name("change/status/status/");
    Route::resource('sections',SectionController::class);
    Route::resource('chats',ChatController::class);
    Route::resource('sliders',SliderController::class);
    Route::get('getMessage/{id}',[ChatController::class,'getMessage'])->name("getMessage");
    Route::post('sendMessage',[ChatController::class,'sendMessage'])->name("sendMessage");
    Route::post('update/chat_reply',[ChatController::class,'chatReply'])->name("update/chat_reply");
    Route::get('users/export/data', [UserController::class, 'export'])->name("users/export/data");
    Route::post('events/export/data', [EventController::class, 'export'])->name("events/export/data");
    Route::post('events/export/data/user', [CalendarController::class, 'export'])->name("events/export/data/user");
    Route::get('listOrder/export/data', [OrderController::class, 'listOrderExport'])->name("listOrder/export/data");
    Route::get('profile/export/data', [ProfileController::class, 'profileExport'])->name("profile/export/data");
    Route::get('export/pdf', [CalendarController::class, 'exportPdf'])->name("export/pdf");

});

Route::get("helper",[HelperController::class,"helper"]);
