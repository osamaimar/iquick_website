<?php


namespace App\Traties;
use Auth;
use Hash;
use Illuminate\Support\Str;

trait GetData{

    public function getService($request){
        return [
            'name'=>$request->name,
            'slug'=>Str::of($request->name)->slug('-'),
            'small_description'=>$request->small_description,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>Auth::user()->id,
        ];
    }
    public function getServiceUpdate($request){
        return [
            'name'=>$request->name,
            'slug'=>Str::of($request->name)->slug('-'),
            'small_description'=>$request->small_description,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>Auth::user()->id,
        ];
    }

    public function getPackage($request){
        return [
            'name'=>$request->name,
            'slug'=>Str::of($request->name)->slug('-'),
            'small_description'=>$request->small_description,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>Auth::user()->id,
        ];
    }
    public function getPackageUpdate($request){
        return [
            'name'=>$request->name,
            'slug'=>Str::of($request->name)->slug('-'),
            'small_description'=>$request->small_description,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>Auth::user()->id,
        ];
    }
    public function getAttachment($request,$modelType,$modelId){
        return [
            'name'=>$request->name_attach,
            'file'=>$request->attachment_file,
            'attachmentable_id'=>$modelId,
            'attachmentable_type'=>$modelType,
            'user_id'=>Auth::user()->id,
        ];
    }
    public function getAttachmentType($request,$modelType){
        return [
            'name'=>$request->name_attach,
            'file'=>$request->attachment_file,
            'attachmentable_id'=>$request->product,
            'attachmentable_type'=>$modelType,
            'user_id'=>Auth::user()->id,
        ];
    }
    public function getAttachmentTypeOrder($request,$modelType){
        return [
            'name'=>$request->name_attach,
            'file'=>$request->attachment_file,
            'attachmentable_id'=>$request->order_id,
            'attachmentable_type'=>$modelType,
            'user_id'=>Auth::user()->id,
        ];
    }
    public function getAttachmentUpdate($request,$attachment){
            return [
                'name'=>$request->name_attach,
                'file'=>$request->has("attachment_file")&&$request->attachment_file!=null? $request->attachment_file : $attachment->file,
            ];        
    }

    public function getAboutStore($request){
        return [
            'title'=>$request->title,
            'description'=>$request->description,
            'image1'=> $request->image1 ,
            'image2'=> $request->image2 ,
            'image3'=> $request->image3 ,
            'image4'=> $request->image4 ,
        ];
    }

    public function getAbout($request,$about){
        return [
            'title'=>$request->title,
            'description'=>$request->description,
            'image1'=>$request->has("image1")&&$request->image1!=null ? $request->image1 : $about->image1,
            'image2'=>$request->has("image2")&&$request->image2!=null ? $request->image2 : $about->image2,
            'image3'=>$request->has("image3")&&$request->image3!=null ? $request->image3 : $about->image3,
            'image4'=>$request->has("image4")&&$request->image4!=null ? $request->image4 : $about->image4,
        ];
    }

    public function getSetting($request){
        return [
            'name'=>$request->name,
            'header_logo'=>$request->header_logo,
            'footer_logo'=>$request->footer_logo,
            'icon'=>$request->icon,
            'small_description'=>$request->small_description,
            'about_us'=>$request->about_us,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'insta'=>$request->insta,
            'youtube'=>$request->youtube,
            'Linkedin'=>$request->Linkedin,
            'mail_password'=>$request->mail_password,
            'mail_from_address'=>$request->mail_from_address,
            'live_chat'=>$request->live_chat
        ];
    }

    public function getSettingUpdate($request,$setting){
        return [
            'name'=>$request->name,
            'header_logo'=>$request->has("header_logo")&&$request->header_logo!=null ? $request->header_logo : $setting->header_logo,
            'footer_logo'=>$request->has("footer_logo")&&$request->footer_logo!=null ? $request->footer_logo : $setting->footer_logo,
            'icon'=>$request->has("icon") ? $request->icon : $setting->icon,
            'small_description'=>$request->small_description,
            'about_us'=>$request->about_us,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'insta'=>$request->insta,
            'youtube'=>$request->youtube,
            'Linkedin'=>$request->Linkedin,
            'mail_password'=>$request->mail_password,
            'mail_from_address'=>$request->mail_from_address,
            'live_chat'=>$request->live_chat
        ];
    }

    public function storeUser($request){
        return [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status'=>$request->status,
            'type'=>$request->type,
            'type_user'=>$request->type_user!=null?$request->type_user:"0",
            'code'=>mt_rand(1000000, 9999999)
        ];
    }

    public function updateUser($request,$user){
        return [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'password' => ($request->has("password")&&$request->password!=null) ? Hash::make($request->password) : $user->password,
            'status'=>$request->status,
            'type'=>$request->type,
            'type_user'=>$request->type_user!=null?$request->type_user:"0",
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
            'user_id'=>Auth::user()->id,
        ];
    }
    public function storeProfileByAdmin($request){
        return [
            'name'=>$request->name,
            'link'=>$request->link,
            'file'=>$request->file,
            'user_id'=>$request->user_id,
            'code'=>mt_rand(1000000, 9999999)
        ];
    }
    public function storeProfile($request){
        return [
            'name'=>$request->name,
            'link'=>$request->link,
            'file'=>$request->file,
            'user_id'=>Auth::user()->id,
            'code'=>mt_rand(1000000, 9999999),
            'status'=>"0"
        ];
    }
    public function updateProfile($request){
        return [
            'name'=>$request->name,
            'link'=>$request->link,
            'user_id'=>Auth::user()->id,
        ];
    }

    public function storeOrderServiceUser($request,$model){
        return [
            'code'=>mt_rand(1000000, 9999999),
            'name'=>Auth::user()->firstname.' '.Auth::user()->lastname,
            'file'=>$request->file,
            'status'=>"successful",
            'total_price'=>$model->price,
            'description_cust'=>$request->description_cust,
            'type_order'=>'service',
            'user_id'=>Auth::user()->id,
            'type_id'=>$model->id,
            'profile_id'=>session()->get('profile_id'),
        ];
    }

    public function storeCommentService($request){
        return [
            'order_id'=>$request->order_id,
            'filed_name'=>$request->file,
            'comments'=>$request->comments,
        ];
    }

    public function storeOrderPackageUser($request,$model){
        return [
            'code'=>mt_rand(1000000, 9999999),
            'name'=>Auth::user()->firstname.' '.Auth::user()->lastname,
            'file'=>$request->file,
            'status'=>"successful",
            'total_price'=>$model->price,
            'description_cust'=>$request->description_cust,
            'type_order'=>'package',
            'user_id'=>Auth::user()->id,
            'type_id'=>$model->id,
            'profile_id'=>session()->get('profile_id'),
        ];
    }

    public function storeOrderByAdmin($request,$model,$type,$user){
        return [
            'code'=>mt_rand(1000000, 9999999),
            'name'=>$user->firstname.' '.$user->lastname,
            'file'=>$request->file,
            'status'=>"successful",
            'total_price'=>$model->price,
            'description_cust'=>$request->description_cust,
            'type_order'=>$type,
            'user_id'=>$user->id,
            'type_id'=>$model->id,
            'profile_id'=>$request->profile_id,
        ];
    }

}