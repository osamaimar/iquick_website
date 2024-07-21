<?php

namespace App\Http\Resources\Api;

use App\Models\UserProfile;
use Illuminate\Http\Resources\Json\JsonResource;

class RefreshResource extends JsonResource
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
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'profile' => $this->profile_id,
            "username"=>$this->userprofile!=null?$this->userprofile->username:'',
            "date_of_Birth"=>$this->userprofile!=null?$this->userprofile->date_of_Birth:'',
            "gender"=> $this->userprofile!=null?$this->userprofile->gender:'',
            "country"=>$this->userprofile!=null?$this->userprofile->country:'',
            "profile_image"=>$this->userprofile!=null?"https://iquick.eraasoft.com/storage/images/userprofile/".$this->userprofile->profile_image:'',
            "city"=> $this->userprofile!=null?$this->userprofile->city:'',
            "post_number"=> $this->userprofile!=null?$this->userprofile->post_number:'',
            "address"=> $this->userprofile!=null?$this->userprofile->address:'',
            "phone"=> $this->userprofile!=null?$this->userprofile->phone:'',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
