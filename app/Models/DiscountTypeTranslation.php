<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountTypeTranslation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =
    [
        'discount_type_id',
        'locale',
        'name',
    ];
}
