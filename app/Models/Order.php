<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'user_id',
        'restaurant_id',
        'name',
        'email',
        'phone_number',
        'total',
        'instruction',
        'sub_total',
        'address',
        'status',
        'payment_method',
        'payment_status',
    ];

    protected $casts = [
        'status' => OrderStatusEnum::class,
    ];
}
