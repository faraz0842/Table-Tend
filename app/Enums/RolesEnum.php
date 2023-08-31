<?php

namespace App\Enums;

enum RolesEnum: string
{
    case ADMIN = 'admin';
    case DRIVER = 'driver';
    case CUSTOMER = 'customer';
    case MANAGER = 'manager';
}
