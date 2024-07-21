<?php


namespace App\Traties;
use Auth;
use Hash;
use Illuminate\Support\Str;

trait ApiData{

    public function storeOrderServiceUser($request,$model){
        return [
            'code'=>mt_rand(1000000, 9999999),
            'name'=>auth()->guard('api')->user()->firstname.' '.auth()->guard('api')->user()->lastname,
            'file'=>$request->file,
            'status'=>"successful",
            'total_price'=>$model->price,
            'description_cust'=>$request->description_cust,
            'type_order'=>'service',
            'user_id'=>auth()->guard('api')->user()->id,
            'type_id'=>$model->id,
            'profile_id'=>auth()->guard('api')->user()->profile_id,
        ];
    }

    public function storeOrderPackageUser($request,$model){
        return [
            'code'=>mt_rand(1000000, 9999999),
            'name'=>auth()->guard('api')->user()->firstname.' '.auth()->guard('api')->user()->lastname,
            'file'=>$request->file,
            'status'=>"successful",
            'total_price'=>$model->price,
            'description_cust'=>$request->description_cust,
            'type_order'=>'package',
            'user_id'=>auth()->guard('api')->user()->id,
            'type_id'=>$model->id,
            'profile_id'=>auth()->guard('api')->user()->profile_id,
        ];
    }

}