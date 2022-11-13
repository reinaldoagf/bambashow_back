<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;

class OrderSupplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'pdf',
        'status',
    ];
    protected $with = ['provider'];
    public function provider()
    {
        return $this->hasOne(Provider::class,'id','id_provider');
    }
}
