<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class LandingSectionProductCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'id_landing_section',
    ];
    protected $with = ['product'];
    public function product()
    {
        return $this->hasOne(Product::class,'id','id_product');
    }
}
