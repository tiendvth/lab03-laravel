<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'total',
        'customer_name',
        'customer_email',
        'customer_address',
        'customer_phone'
    ];
}
