<?php

namespace App\Http\Resources\Api\AccountSetting;

use App\Models\Profile;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AccountSettingResource extends JsonResource
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
            'order_count'=>$this->where("user_id",auth()->guard('api')->user()->id)->get()->count(),
            'order_count_pending'=>$this->where("user_id",auth()->guard('api')->user()->id)->where("status",'pending')->get()->count(),
            'order_count_done'=>$this->where("user_id",auth()->guard('api')->user()->id)->where("status",'done')->get()->count(),
            'order_count_canceled'=>$this->where("user_id",auth()->guard('api')->user()->id)->where("status",'canceled')->get()->count(),
            'order_count_successful'=>$this->where("user_id",auth()->guard('api')->user()->id)->where("status",'successful')->get()->count(),
            'profile_count'=>Profile::where("user_id",auth()->guard('api')->user()->id)->get()->count(),
        ];
    }
}
