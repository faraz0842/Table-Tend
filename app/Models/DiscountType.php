<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class DiscountType extends Model implements TranslatableContract
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

    protected $fillable =
    [
        'slug',
        'color',
    ];

    /**
     * Get the post's image.
     */
    public function coupon(): MorphOne
    {
        return $this->morphOne(Discountable::class, 'discountable');
    }

    /**
     * Generates a slug from given value using Str class.
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

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    /**
     * Get the discountTypeTranslations for the discountType.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discountTypeTranslations(): HasMany
    {
        return $this->hasMany(DiscountTypeTranslation::class)->withTrashed();
    }
}
