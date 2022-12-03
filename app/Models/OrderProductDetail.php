<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderProductDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'quatity',
        'size',
        'id_product',
        'id_order_product',
    ];
    protected $with = ['product'];
    public function product()
    {
        return $this->hasOne(Product::class,'id','id_product');
    }
}
