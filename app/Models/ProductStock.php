<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $fillable = [
        'size',
        'quantity',
        'id_product'
    ];
    
    protected $with = ['product'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
