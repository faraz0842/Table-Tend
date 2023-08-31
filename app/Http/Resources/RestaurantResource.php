<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            'image' => $this->getFirstMediaUrl('restaurant.images'),
            'name' => $this->name,
            'delivery_fee' => $this->delivery_fee,
            'delivery_range' => $this->delivery_range,
            'default_tax' => $this->default_tax,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'closed_restaurant' => $this->closed_restaurant,
            'availability_for_delivery' => $this->availability_for_delivery,
            'description' => strip_tags($this->description),
            'information' => strip_tags($this->information),
            'admin_commission' => $this->admin_commission,
            'active' => $this->active,
        ];
    }
}
