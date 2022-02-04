<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_date',
        'expected_delivery_date',
        'delivery_date',
        'customer_name',
        'facebook_name',
        'customer_phone',
        'address',
        'customer_type',
        'quantity',
        'clothing_type',
        'color',
        'payment_type',
        'cost',
        'total_cost',
        'delivery_status',
        'payment_status',
        'delivery_fee',
        
    ];
}
