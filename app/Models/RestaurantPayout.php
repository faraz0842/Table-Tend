<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantPayout extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['restaurant_id', 'payment_method_id', 'paid_date', 'amount', 'note'];

    /**
     * The restaurant relationship method returns the restaurants associated with the RestaurantPayout.
     *
     * @return BelongsTo
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * The paymentMethod relationship method returns the paymentMethods associated with the RestaurantPayout.
     *
     * @return BelongsTo
     */
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
