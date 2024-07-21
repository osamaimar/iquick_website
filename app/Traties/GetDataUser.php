<?php


namespace App\Traties;
use Auth;
use Hash;
use Illuminate\Support\Str;

trait GetDataUser{

    public function editProfile($request,$user){
        return [
            'name' => $request->name,
            'email'=>$request->email,
            'password' => ($request->has("password")&&$request->password!=null) ? Hash::make($request->password) : $user->password,
        ];
    }

}