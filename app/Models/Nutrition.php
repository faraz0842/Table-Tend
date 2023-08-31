<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nutrition extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public array $translatedAttributes = ['name'];

    /**
     * Get a new slug attribute instance.
     *
     * @return Attribute
     */
    protected $fillable = [
        'slug',
        'food_id',
        'quantity',
    ];

    /**
     * Get a new slug attribute instance.
     *
     * @return Attribute
     */
    protected function slug(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value,
            set: fn ($value) => Str::slug($value)
        );
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    /**
     * Get the nutritionTranslations for the nutrition.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nutritionTranslations(): HasMany
    {
        return $this->hasMany(NutritionTranslation::class)->withTrashed();
    }
}
