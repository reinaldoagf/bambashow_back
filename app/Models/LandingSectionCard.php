<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingSectionCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'icon',
        'theme',
        'description',
        'image',
        'type',
        'id_landing_section',
    ];
}
