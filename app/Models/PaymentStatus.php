<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentStatus extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =
    [
        'slug',
        'color'
    ];

    /**
     * Define a one-to-many relationship between the current model and the PaymentStatusTranslation model.
     * @return HasMany
     */
    public function locales(): HasMany
    {
        return $this->hasMany(PaymentStatusTranslation::class, 'payment_status_id', 'id');
    }
}
