<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Extra extends Model implements HasMedia, TranslatableContract
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
    public array $translatedAttributes = ['name', 'description'];

    /**
     * Get a new slug attribute instance.
     *
     * @return Attribute
     */
    protected $fillable = [
        'food_id',
        'extra_group_id',
        'slug',
        'price',
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
     * The extraGroup relationship method returns the extraGroups associated with the DriverPayout.
     *
     * @return BelongsTo
     */
    public function extraGroup(): BelongsTo
    {
        return $this->belongsTo(ExtraGroup::class);
    }

    /**
     * The food relationship method returns the foods associated with the DriverPayout.
     *
     * @return BelongsTo
     */
    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    /**
     * Get the extraTranslations for the extra.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extraTranslations(): HasMany
    {
        return $this->hasMany(ExtraTranslation::class)->withTrashed();
    }
}
