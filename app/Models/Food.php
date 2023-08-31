<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Food extends Model implements HasMedia, TranslatableContract
{
    use Translatable;
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public array $translatedAttributes = ['name', 'description', 'ingredients'];

    protected $table = 'foods';

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

    /**
     * The attributes that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'restaurant_id',
        'category_id',
        'price',
        'discount_price',
        'package_count',
        'weight',
        'unit_id',
        'featured',
        'deliverable',
    ];

    /**
     * Get the foodTranslations for the food.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foodTranslations(): HasMany
    {
        return $this->hasMany(FoodTranslation::class)->withTrashed();
    }

    /**
     * Get the category that the food item belongs to.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the restaurant that the food item belongs to.
     *
     * @return BelongsTo
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * Returns a collection of related "Extra" model instances.
     * @return HasMany
     */
    public function extra(): HasMany
    {
        return $this->hasMany(Extra::class);
    }

    /**
     * Get the reviews for the food.
     *
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(FoodReview::class, 'food_id', 'id');
    }

    /**
     * Returns a collection of related "Nutrition" model instances.
     * @return HasMany
     */
    public function nutrition(): HasMany
    {
        return $this->hasMany(Nutrition::class);
    }

    /**
     * Returns a collection of related "sliders" model instances.
     * @return HasMany
     */
    public function sliders(): HasMany
    {
        return $this->hasMany(AppSlider::class);
    }

    /**
     * Get the coupons for the food item.
     *
     * @return MorphMany
     */
    public function coupons(): MorphMany
    {
        return $this->morphMany(Discountable::class, 'discountable');
    }
}
