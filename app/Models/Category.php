<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements HasMedia, TranslatableContract
{
    use Translatable;
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public array $translatedAttributes = ['name', 'description'];

    /**
     * The attributes that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'slug'
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
     * Get the categoryTranslations for the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoryTranslations(): HasMany
    {
        return $this->hasMany(CategoryTranslation::class)->withTrashed();
    }

    /**
     * Get the foods for the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }
}
