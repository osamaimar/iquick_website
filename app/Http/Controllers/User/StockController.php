<?php

namespace App\Http\Controllers\User;

use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\Stock;
use App\Traties\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Str;
class StockController extends Controller
{
    use UploadFile;
    
    public function store(Request $request){
        $request->validate([
            'description'    =>'nullable|min:3|max:50000',
            'file'                =>"nullable|mimes:webp,jpg,png,pdf|max:2024",
        ]);
        $stock=Stock::updateOrInsert(
            ['service_id'=>$request->service_id,"user_id"=>Auth::user()->id,'order_id' => $request->order_id],
            [
            'description'=>$request->description,
            ]
        )->first();
        if($request->has('file')&&$request->file!=null){
            $stock->file=$this->uploadFile($request->file('file'),'/images/stockes/attachments/');
            $stock->save();
        }
        $data=[
            'order_id'=>$stock->order_id,
            'messages'=>__("admin.order_stocks"),
            'type_order'=>Str::limit($stock->description,50)!=null?Str::limit($stock->description,50):'',
            'username'=>"اسم الخدمة",
            'order_code'=>$stock->service->name,
            "employee_type"=>"0",
            "employee_id"=>null
        ];
        broadcast(new MyEvent($data))->toOthers();
        Notice::create([
            'order_id'=>$stock->order_id,
            'messages'=>__("admin.order_stocks"),
            'order_status'=>Str::limit($stock->description,50)!=null?Str::limit($stock->description,50):'',
            'user_name'=>"اسم الخدمة",
            'order_code'=>$stock->service->name,
            'user_id'=>Auth::user()->id,
            "employee_type"=>"0"
        ]);
        return response()->json(['success'=>__("user.sent_order")]);
    }
}
