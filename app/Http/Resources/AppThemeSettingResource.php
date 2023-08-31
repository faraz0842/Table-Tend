<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppThemeSettingResource extends JsonResource
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
            'main_color_light' => $this->main_color_light,
            'main_color_dark' => $this->main_color_dark,
            'second_color_light' => $this->second_color_light,
            'second_color_dark' => $this->second_color_dark,
            'accent_color_light' => $this->accent_color_light,
            'accent_color_dark' => $this->accent_color_dark,
            'background_color_light' => $this->background_color_light,
            'background_color_dark' => $this->background_color_dark,
        ];
    }
}
