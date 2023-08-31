<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryAddress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'description',
        'address',
        'latitude',
        'longitude',
        'is_default',
    ];

    /**
     * Get the user that owns the phone.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Retrieve the default delivery address for a given user.
     *
     * @param  Builder  $query
     * @param  int  $userId The ID of the user
     * @return Builder|null The default delivery address, or null if not found
     */
    public function scopeDefaultAddress(Builder $query, int $userId): ?Builder
    {
        $address = $query->where('user_id', $userId)
            ->where('is_default', true)
            ->first();

        return $address ? $query->whereKey($address->getKey()) : null;
    }
}
