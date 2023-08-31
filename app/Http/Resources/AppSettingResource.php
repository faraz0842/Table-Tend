<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppSettingResource extends JsonResource
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
            'google_Maps_Key' => $this->google_Maps_Key,
            'default_unit_of_distance' => $this->default_unit_of_distance,
            'language_id' => $this->language_id,
            'application_version' => $this->application_version,
            'show_version' => $this->show_version,
        ];
    }
}
