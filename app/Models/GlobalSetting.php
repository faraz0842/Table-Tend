<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GlobalSetting extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = ['settings'];

    protected $fillable = [
        'application_name',
        'short_description',
        'fixed_header',
        'fixed_footer',
        'facebook_link',
        'insta_link',
        'google_link',
        'twitter_link',
        'email',
    ];
}
