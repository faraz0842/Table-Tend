<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class RestaurantTranslation extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    /**
     * Fillable fields for the model.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id',
        'locale',
        'name',
        'address',
        'description',
        'information',
    ];
}
