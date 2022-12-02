<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HomeSectionCard;
use App\Models\HomeSectionListItem;
use App\Models\HomeSectionProductCard;
use App\Models\HomeSectionCarouselItem;

class HomeSection extends Model
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
        return $this->hasMany(HomeSectionCard::class,'id_Home_section');
    }
    public function list_items()
    {
        return $this->hasMany(HomeSectionListItem::class,'id_Home_section');
    }
    public function carousel_items()
    {
        return $this->hasMany(HomeSectionCarouselItem::class,'id_Home_section');
    }
    public function product_cards()
    {
        return $this->hasMany(HomeSectionProductCard::class,'id_Home_section');
    }
}
