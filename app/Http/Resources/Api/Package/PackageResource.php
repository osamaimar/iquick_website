<?php

namespace App\Http\Resources\Api\Package;

use App\Http\Resources\Api\Service\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PackageResource extends JsonResource
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
            'name'=>$this->name,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'price'=>$this->price,
            'small_description'=>$this->small_description,
            'user_id'=>$this->user_id,
            'services'=>ServiceResource::collection($this->services),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
