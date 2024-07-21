<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthUpdateUserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'title' => $this->title,
            'address' => $this->address,
            'type' => $this->type,
            'patient_id'=>$this->patients,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
