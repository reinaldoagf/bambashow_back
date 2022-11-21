<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'id_product_category'
    ];
    protected $with = ['raw_material'];
    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
