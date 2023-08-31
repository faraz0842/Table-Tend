<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
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
            'image' => $this->getFirstMediaUrl('food.images'),
            'name' => $this->name,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'unit' => $this->unit,
            'package_count' => $this->package_count,
            'weight' => $this->weight,
            'description' => strip_tags($this->description),
            'ingredients' => strip_tags($this->ingredients),
            'featured' => $this->featured,
            'deliverable_food' => $this->deliverable_food,
            'nutritions' => NutritionResource::collection($this->whenLoaded('nutritions')),
        ];
    }
}
