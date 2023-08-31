<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileScreenSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_1',
        'section_2',
        'section_3',
        'section_4',
        'section_5',
        'section_6',
        'section_7',
        'section_8',
        'section_9',
        'section_10',
        'section_11',
        'section_12',
    ];
}
