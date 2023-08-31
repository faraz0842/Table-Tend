<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantCuisine extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Fillable fields for the model.
     *
     * @var array
     */
    protected $fillable =
    [
        'cuisine_id',
        'restaurant_id'
    ];
}
