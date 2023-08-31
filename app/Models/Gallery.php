<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model implements HasMedia, TranslatableContract
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
    public array $translatedAttributes = ['description'];

    /**
     * The attributes that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['restaurants'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurants');
    }

    /**
     * Get the galleryTranslations for the gallery.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function galleryTranslations(): HasMany
    {
        return $this->hasMany(GalleryTranslation::class)->withTrashed();
    }
}
