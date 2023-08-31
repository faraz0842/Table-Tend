<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverPayout extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'payment_method_id', 'paid_date', 'note', 'amount'];

    /**
     * The user relationship method returns the users associated with the DriverPayout.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The paymentMethod relationship method returns the paymentMethods associated with the DriverPayout.
     *
     * @return BelongsTo
     */
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
