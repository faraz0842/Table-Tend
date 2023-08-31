<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PaymentMethod extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public array $translatedAttributes = ['locale', 'name'];


    protected $fillable =
    [
        'slug',
        'color',
        'status'
    ];

    /**
     * Define a one-to-many relationship between the current model and the PaymentMethodTranslation model.
     * @return HasMany
     */
    public function paymentMethodTranslations(): HasMany
    {
        return $this->hasMany(PaymentMethodTranslation::class)->withTrashed();
    }
}
