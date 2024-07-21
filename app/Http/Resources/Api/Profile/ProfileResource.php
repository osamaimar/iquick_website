<?php

namespace App\Http\Resources\Api\Profile;

use App\Models\Attachment;
use App\Models\Profile;
use Illuminate\Http\Resources\Json\JsonResource;

use function PHPSTORM_META\map;

class ProfileResource extends JsonResource
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
            'id'            =>$this->id,
            'name'          =>$this->name,
            'link'          =>$this->link,
            'file'          =>$this->file,
            'attachment_id' =>Attachment::where('attachmentable_id',$this->id)->where('attachmentable_type','App\Models\Profile')->get(),
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
