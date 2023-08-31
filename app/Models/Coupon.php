<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =
    [
        'slug',
        'code',
        'discount_type_id',
        'discount',
        'expiry_date',
        'description',
        'enabled',
    ];
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

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class, 'restaurants');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'categories');
    }

    public function discountType()
    {
        return $this->belongsTo(DiscountType::class);
    }

    public function discountables()
    {
        return $this->hasMany(Discountable::class);
    }
}
