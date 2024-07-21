<?php

namespace App\Http\Resources\Api\EditProfile;

use Illuminate\Http\Resources\Json\JsonResource;

class EditProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "username"=>$this->username,
            "date_of_Birth"=>$this->date_of_Birth,
            "gender"=> $this->gender,
            "country"=>$this->country,
            "profile_image"=>$this->profile_image!=null?"https://iquick.eraasoft.com/storage/images/userprofile/".$this->profile_image:"https://iquick.eraasoft.com/assets/images/avatar/images.jpg",
            "city"=> $this->city,
            "post_number"=> $this->post_number,
            "address"=> $this->address,
            "phone"=> $this->phone,
            "firstname"=> $this->user->firstname,
            "lastname"=> $this->user->lastname,
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at,
        ];
    }
}
