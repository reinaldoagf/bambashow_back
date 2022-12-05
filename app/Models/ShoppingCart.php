<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'product'
    ];
    protected $with = ['product'];
    public function user()
    {
        return $this->belongsTo(User::class,'id','user');
    }
    public function product()
    {
        return $this->hasOne(Product::class,'id','product');
    }
}
