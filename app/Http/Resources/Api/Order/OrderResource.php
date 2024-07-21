<?php

namespace App\Http\Resources\Api\Order;

use App\Models\Attachment;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'code'=>$this->code,
            'name'=>$this->name,
            'file'=>$this->file?$this->file:'',
            'status'=>__("admin.$this->status"),
            'total_price'=>$this->total_price,
            'description_cust'=>$this->description_cust?$this->description_cust:'',
            'type_order'=>$this->type_order=='service'?__("admin.services"):__("admin.packages"),
            'order_name'=>$this->type_order=='service'?$this->service->name:$this->package->name,
            'user_id'=>$this->user_id,
            'type_id'=>$this->type_id,
            'profile_id'=>$this->profile,
            'rating'=>$this->rating?(double)$this->rating:(double)0,
            'attachment_id' =>Attachment::where('attachmentable_id',$this->id)->where('attachmentable_type','App\Models\Order')->get(),
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
