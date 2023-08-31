<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppScreenSettingResource extends JsonResource
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
            'section_1' => $this->section_1,
            'section_2' => $this->section_2,
            'section_3' => $this->section_3,
            'section_4' => $this->section_4,
            'section_5' => $this->section_5,
            'section_6' => $this->section_6,
            'section_7' => $this->section_7,
            'section_8' => $this->section_8,
            'section_9' => $this->section_9,
            'section_10' => $this->section_10,
            'section_11' => $this->section_11,
            'section_12' => $this->section_12,
        ];
    }
}
