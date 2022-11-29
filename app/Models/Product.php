<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\ProductStock;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'id_product_category'
    ];
    protected $with = ['product_category','stock'];
    public function product_category()
    {
        return $this->hasOne(ProductCategory::class,'id','id_product_category');
    }
    public function stock()
    {
        return $this->hasMany(ProductStock::class,'id_product');
    }
}
