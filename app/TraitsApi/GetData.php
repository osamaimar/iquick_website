<?php


namespace App\TraitsApi;
use Auth;
use Hash;
use Illuminate\Support\Str;
trait GetData{

     public function storeUser($request){
          return [
              'firstname' => $request->firstname,
              'lastname' => $request->lastname,
              'email' => $request->email,
              'password' => Hash::make($request->password),
              'code'=>mt_rand(1000000, 9999999)
          ];
      }

      public function storeProfile($request){
        return [
            'name'=>$request->name,
            'link'=>$request->link,
            'file'=>$request->file,
            'user_id'=>auth()->guard('api')->user()->id,
            'code'=>mt_rand(1000000, 9999999),
            'status'=>"0"
        ];
    }

    public function updateProfile($request){
        return [
            'name'=>$request->name,
            'link'=>$request->link,
            'user_id'=>auth()->guard('api')->user()->id,
        ];
    }

    public function storeUserProfile($request){
        return [
            'username'=>$request->username,
            'date_of_Birth'=>date('Y-m-d',strtotime($request->date_of_Birth)),
            'gender'=>$request->gender,
            'country'=>$request->country,
            'city'=>$request->city,
            'post_number'=>$request->post_number,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'user_id'=>auth()->guard('api')->user()->id,
        ];
    }
    
}