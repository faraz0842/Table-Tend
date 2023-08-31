<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'google_Maps_Key',
        'default_unit_of_distance',
        'language_id',
        'application_version',
        'show_version',
    ];
}
