<?php

namespace App\Enums;

enum OrderPaymentStatusEnum: string
{
    case UnPaid = 'unpaid';
    case Paid = 'paid';
}
