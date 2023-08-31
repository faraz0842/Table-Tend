<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Faq extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public array $translatedAttributes = ['question', 'answer'];

    protected $fillable = [
        'faq_category_id',
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
     * The FaqCategory relationship method returns the category associated with the FAQ.
     *
     * @return BelongsTo
     */
    public function faqCategory(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class);
    }

    /**
     * Get the faqTranslations for the faq.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faqTranslations(): HasMany
    {
        return $this->hasMany(FaqTranslation::class)->withTrashed();
    }
}
