<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProductPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'amount',
        'description',
        'image',
        'id_order_product',
    ];
}
