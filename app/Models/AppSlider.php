<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AppSlider extends Model implements HasMedia, TranslatableContract
{
    use Translatable;
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public array $translatedAttributes = ['text', 'button'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order',
        'slug',
        'food_id',
        'restaurant_id',
        'text_position',
        'text_color',
        'button_color',
        'background_color',
        'indicator_color',
        'image_fit',
        'enabled',
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

    /**
     * Get the sliderTranslations for the slider.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sliderTranslations(): HasMany
    {
        return $this->hasMany(AppSliderTranslation::class)->withTrashed();
    }


    /**
     * Get the food associated with the AppSlider.
     *
     * @return BelongsTo
     */
    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    /**
     * Get the restaurant associated with the AppSlider.
     *
     * @return BelongsTo
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}
