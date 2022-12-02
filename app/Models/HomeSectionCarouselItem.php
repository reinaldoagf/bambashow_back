<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSectionCarouselItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'description',
        'id_home_section',
    ];
}
