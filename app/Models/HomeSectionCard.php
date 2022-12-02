<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSectionCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'icon',
        'theme',
        'description',
        'image',
        'type',
        'id_home_section',
    ];
}
