<?php

namespace App\TraitsApi;

trait ValidationApi{

    public function validationLogin(){
        return [
             'email' => 'required|string|email',
             'password' => 'required|string',
        ];
    }

    public function validationRegister(){
        return [
        'firstname' => 'required|min:3|max:150',
        'lastname' => 'required|min:3|max:150',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|max:50',
        ];
    }

    public function validationEditProfile(){
        return [
            'username' => 'required|min:3|max:150',
            'date_of_Birth'=>'required|min:3|max:150',
            'gender'=>'required|',
            'profile_image'=>'nullable|mimes:webp,jpeg,jpg,png,pdf|max:500',
            'country'=>'required|max:150',
            'city'=>'required|min:3|max:150',
            'post_number'=>'required|max:150',
            'address'=>'required|min:3|max:150',
            'phone'=>'required|min:3|max:150',
        ];
    }

    public function validationChangePassword(){
        return [
            'old_password' => 'required|min:6|max:50',
            'new_password' => '|required_with:password_confirmation|same:password_confirmation',
        ];
    }

    public function validationProfile(){
        return [
            'name'         =>'required|min:3|max:150',
            'link'         =>"required|url",
            'file'         =>"nullable|mimes:webp,jpeg,jpg,png,pdf|max:2024",
        ];
    }

    public function validationOrder(){
        return [
            'description_cust'    =>'nullable|min:3|max:5000',
            'file'                =>"nullable|mimes:webp,jpeg,jpg,png,pdf|max:2024",
        ];
    }
}