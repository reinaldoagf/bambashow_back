<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderProductDetail;
use App\Models\OrderProductPayment;
class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'status',
    ];
    protected $with = ['user','details','payments'];
    public function user()
    {
        return $this->hasOne(User::class,'id','id_user');
    }
    public function details()
    {
        return $this->hasMany(OrderProductDetail::class,'id_order_product');
    }
    public function payments()
    {
        return $this->hasMany(OrderProductPayment::class,'id_order_product');
    }
}
