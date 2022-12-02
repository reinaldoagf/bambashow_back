<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class HomeSectionProductCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'id_home_section',
    ];
    protected $with = ['product'];
    public function product()
    {
        return $this->hasOne(Product::class,'id','id_product');
    }
}
