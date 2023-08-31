<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryRestaurantResource extends JsonResource
{
    protected $restaurants;

    public function getRestaurants($id)
    {
        $category = Category::findOrFail($id);

        $restaurants = new Collection();

        $category->load(['foods.restaurants' => function ($q) use (&$restaurants) {
            $restaurants = $q->get()->unique();
        }]);

        return $restaurants;
    }

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
            'image' => $this->getFirstMediaUrl('category.images'),
            'name' => $this->name,
            'description' => strip_tags($this->description),
            'restaurants' => RestaurantResource::collection($this->getRestaurants($this->id)),
        ];
    }
}
