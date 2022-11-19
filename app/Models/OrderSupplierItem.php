<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderSupplier;
use App\Models\RawMaterial;

class OrderSupplierItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_order_supplier',
        'id_raw_material',
        'quantity',
        'square_meter',
    ];
    protected $with = ['raw_material'];
    public function orderSupplier()
    {
        return $this->belongsTo(OrderSupplier::class);
    }    
    public function raw_material()
    {
        return $this->hasOne(RawMaterial::class,'id','id_raw_material');
    }
}
