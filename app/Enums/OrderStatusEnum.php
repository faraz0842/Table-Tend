<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case GettingPrepared = 'getting-prepared';
    case BeingDelivered = 'being-delivered';
    case Delivered = 'delivered';
}
