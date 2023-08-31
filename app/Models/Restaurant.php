<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Restaurant extends Model implements HasMedia, TranslatableContract
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
    public array $translatedAttributes = ['name', 'address', 'description', 'information'];

    /**
     * Fillable fields for the model.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'latitude',
        'longitude',
        'phone',
        'mobile',
        'admin_commission',
        'delivery_fee',
        'delivery_range',
        'default_tax',
        'closed',
        'active',
        'availability_for_delivery',
    ];

    /**
     * Get the UserRestaurant models associated with the current Restaurant model.
     *
     * @return HasMany
     */
    public function userRestaurants(): HasMany
    {
        return $this->hasMany(UserRestaurant::class);
    }

    /**
     * Get the RestaurantCuisine models associated with the current Restaurant model.
     *
     * @return HasMany
     */
    public function restaurantCuisines(): HasMany
    {
        return $this->hasMany(RestaurantCuisine::class);
    }

    /**
     * Get the Gallery models associated with the current Restaurant model.
     *
     * @return HasMany
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * Get the RestaurantPayout models associated with the current Restaurant model.
     *
     * @return HasMany
     */
    public function restaurant_payout(): HasMany
    {
        return $this->hasMany(RestaurantPayout::class);
    }

    /**
     * Get the Cuisine models associated with the current Restaurant model.
     *
     * @return BelongsToMany
     */
    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class, 'restaurant_cuisines');
    }

    /**
     * Get the User models associated with the current Restaurant model.
     *
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_restaurants');
    }

    /**
     * Get the Food model associated with the current Restaurant model.
     *
     * @return HasMany
     */
    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    /**
     * Get the AppSlider models associated with the current Restaurant model.
     *
     * @return HasMany
     */
    public function sliders(): HasMany
    {
        return $this->hasMany(AppSlider::class);
    }

    /**
     * Get the Discountable models associated with the current Restaurant model.
     *
     * @return MorphMany
     */
    public function coupon()
    {
        return $this->morphMany(Discountable::class, 'discountable');
    }

    /**
     * Get the reviews for the restaurant.
     *
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(RestaurantReview::class, 'restaurant_id', 'id');
    }

    /**
     * Get the restaurantTranslations for the restaurant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function restaurantTranslations(): HasMany
    {
        return $this->hasMany(RestaurantTranslation::class)->withTrashed();
    }
}
