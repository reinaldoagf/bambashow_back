<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingSectionListItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'icon',
        'theme',
        'id_landing_section',
    ];

}
