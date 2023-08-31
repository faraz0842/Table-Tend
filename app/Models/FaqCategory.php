<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class FaqCategory extends Model implements TranslatableContract
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
     * Fillable properties of the model
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'slug',
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

    /**
     * Define a has many relationship with Faq model
     *
     * @return HasMany
     */
    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    /**
     * Get the faqCategoryTranslations for the faqCategory.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faqCategoryTranslations(): HasMany
    {
        return $this->hasMany(FaqCategoryTranslation::class)->withTrashed();
    }
}
