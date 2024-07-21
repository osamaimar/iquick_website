<?php 

namespace App\TraitsApi;

trait ApiTraits{

    public function response($data=[],$message,$code=200,$errors=[]){
        return [
            "data"=>$data,
            "message"=>$message,
            "code"=>$code,
            "errors"=>$errors
        ];
    }

    public function ResponseAuth($data=[],$token,$message,$code=200,$errors=[]){
        return response()->json([
            'data'=>$data,
            'token'=>$token,
            'message'=>$message,
            'code'=>$code,
            'errors'=>$errors
        ],200);
    }

}