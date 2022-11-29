<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    // protected $with = ['products'];
    public function products()
    {
        return $this->hasMany(Product::class,'id_product_category');
    }
}
