<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;
use App\Models\OrderSupplierItem;

class OrderSupplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'pdf',
        'status',
        'id_provider',
        'items'
    ];
    protected $with = ['provider','items'];
    public function provider()
    {
        return $this->hasOne(Provider::class,'id','id_provider');
    }
    public function items()
    {
        return $this->hasMany(OrderSupplierItem::class,'id_order_supplier');
    }
}
