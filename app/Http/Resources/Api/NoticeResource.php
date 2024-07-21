<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class NoticeResource extends JsonResource
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
            'id'=>$this->id,
            'order_id'=>$this->order_id,
            'messages'=>$this->messages,
            'user_name'=>$this->user_name,
            'order_code'=>$this->order_code,
            'order_status'=>$this->order_status=='canceled'||$this->order_status=='done'||$this->order_status=='pending'||$this->order_status=='successful'?__("admin.status").' '.__("admin.$this->order_status"):$this->order_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
