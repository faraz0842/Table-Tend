<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppTheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_color_light',
        'main_color_dark',
        'second_color_light',
        'second_color_dark',
        'accent_color_light',
        'accent_color_dark',
        'background_color_light',
        'background_color_dark',
    ];
}
