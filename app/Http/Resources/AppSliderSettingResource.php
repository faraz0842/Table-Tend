<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppSliderSettingResource extends JsonResource
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

            'order' => $this->order,
            'text' => $this->text,
            'image' => $this->getFirstMediaUrl('slider.images'),
            'button' => $this->button,
            'text_position' => $this->text_position,
            'text_color' => $this->text_color,
            'button_color' => $this->button_color,
            'background_color' => $this->background_color,
            'indicator_color' => $this->indicator_color,
            'image_position' => $this->image_position,
            'food_id' => $this->food_id,
            'restaurant_id' => $this->restaurant_id,
            'status' => $this->status,
        ];
    }
}
