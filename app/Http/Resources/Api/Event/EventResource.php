<?php

namespace App\Http\Resources\Api\Event;

use App\Models\Status;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'title'=>$this->title,
            'event_name'=>$this->event_name, 
            'event_start'=>$this->event_start, 
            'event_end'=>$this->event_end,
            'description'=>$this->description,
            'profile'=>$this->profile->name,
            'client'=>$this->user->firstname.' '.$this->user->lastname,
            'status_color'=>Status::where("id",$this->status)->first()!=null?Status::where("id",$this->status)->first()->color:'#000',
            'status_title'=>Status::where("id",$this->status)->first()!=null?Status::where("id",$this->status)->first()->title:' ',
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
