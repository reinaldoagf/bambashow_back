<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LandingSectionCard;
use App\Models\LandingSectionListItem;
use App\Models\LandingSectionProductCard;
use App\Models\LandingSectionCarouselItem;

class LandingSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'theme',
        'icon_side',
        'icon_side_theme',
        'title_side',
        'description_side',
        'image_side',
        'title',
        'description',
        'active',
        'separator_bottom',
    ];
    
    protected $with = ['cards','list_items','carousel_items','product_cards'];
    public function cards()
    {
        return $this->hasMany(LandingSectionCard::class,'id_landing_section');
    }
    public function list_items()
    {
        return $this->hasMany(LandingSectionListItem::class,'id_landing_section');
    }
    public function carousel_items()
    {
        return $this->hasMany(LandingSectionCarouselItem::class,'id_landing_section');
    }
    public function product_cards()
    {
        return $this->hasMany(LandingSectionProductCard::class,'id_landing_section');
    }
}
