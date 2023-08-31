<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ExtraGroup extends Model implements TranslatableContract
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug'];

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
     * Get all of the extra for the ExtraGroup
     *
     * @return HasMany
     */
    public function extra(): HasMany
    {
        return $this->hasMany(Extra::class);
    }

    /**
     * Get the extraGroupTranslations for the extraGroup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extraGroupTranslations(): HasMany
    {
        return $this->hasMany(ExtraGroupTranslation::class)->withTrashed();
    }
}
