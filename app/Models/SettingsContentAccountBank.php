<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsContentAccountBank extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank',
        'account_number',
        'email',
        'identity_card',
        'phone'
    ];
}
