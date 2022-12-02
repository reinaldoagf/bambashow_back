<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\HomeSection;
use App\Models\HomeSectionListItem;
use App\Models\HomeSectionCard;
use App\Models\HomeSectionCarouselItem;
use App\Models\HomeSectionProductCard;

class HomeSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function servicesSection(){
        $homeSection = new HomeSection();
        $homeSection->key="services";
        $homeSection->icon_side="ni ni-settings-gear-65";
        $homeSection->icon_side_theme="success";
        $homeSection->title_side="Servicios";
        $homeSection->description_side="Tenemos las mejores promociones";
        $homeSection->image_side="https://static.vecteezy.com/system/resources/previews/001/197/380/non_2x/promotion-ribbon-png.png";
        $homeSection->save();
        foreach ([[
            "text"=>"Diseños",
            "icon"=>"ni ni-satisfied",
            "theme"=>"info",
        ], [
            "text"=>"Impresiones",
            "icon"=>"ni ni-satisfied",
            "theme"=>"warning",
        ], [
            "text"=>"Cotizaciones",
            "icon"=>"ni ni-satisfied",
            "theme"=>"info",
        ], [
            "text"=>"Confecciones",
            "icon"=>"ni ni-satisfied",
            "theme"=>"success",
        ]] as $key => $value) {
            $homeSectionListItem = new HomeSectionListItem();
            $homeSectionListItem->text=$value["text"];
            $homeSectionListItem->icon=$value["icon"];
            $homeSectionListItem->theme=$value["theme"];
            $homeSectionListItem->id_home_section=$homeSection->id;
            $homeSectionListItem->save();
        }
    }
    private function designsSection(){
        $homeSection = new HomeSection();
        $homeSection->key="designs";
        $homeSection->theme="gradient-info";
        $homeSection->icon_side="ni ni-settings";
        $homeSection->icon_side_theme="success";
        $homeSection->title_side="Diseños";
        $homeSection->description_side="Diseñamos nuestros productos";
        $homeSection->save();
        foreach ([[
            "title"=>"Diseños según pedidos del cliente",
            "description"=>"Diseños según pedidos del cliente",
            "image"=>"https://impulsapopular.com/wp-content/uploads/2019/07/4525-Herramientas-digitales-para-el-dise%C3%B1o-gr%C3%A1fico.jpg",
            "type"=>"vertical",
        ]] as $key => $value) {
            $homeSectionCard = new HomeSectionCard();
            $homeSectionCard->title=$value["title"];
            $homeSectionCard->description=$value["description"];
            $homeSectionCard->image=$value["image"];
            $homeSectionCard->type=$value["type"];
            $homeSectionCard->id_home_section=$homeSection->id;
            $homeSectionCard->save();
        }
    }
    private function impressionsSection(){
        $homeSection = new HomeSection();
        $homeSection->key="impressions";
        $homeSection->theme="gradient-warning";
        $homeSection->icon_side="ni ni-building text-white";
        $homeSection->icon_side_theme="warning";
        $homeSection->title_side="Impresiones";
        $homeSection->description_side="Hacemos impresiones en franelas, tazas, llaveros...";
        $homeSection->save();
        foreach ([[
            "image"=>"https://i.pinimg.com/474x/dc/d5/12/dcd512b790614fcdc3b219eb97649c37.jpg",
        ], [
            "image"=>"https://i.pinimg.com/550x/b9/79/bf/b979bf5aa8b76b378816de5bfa36f977.jpg",
        ], [
            "image"=>"https://i.pinimg.com/550x/fe/7e/7b/fe7e7b9ffd5d2d17a64627d2aa314357.jpg",
        ]] as $key => $value) {
            $homeSectionCarouselItem = new HomeSectionCarouselItem();
            $homeSectionCarouselItem->image=$value["image"];
            $homeSectionCarouselItem->id_home_section=$homeSection->id;
            $homeSectionCarouselItem->save();
        }
        foreach ([[
            "title"=>"Franelas y sweaters",
            "description"=>"Franelas y sweaters",
            "icon"=>"ni ni-satisfied",
            "theme"=>"success",
            "type"=>"horizontal",
        ],[
            "title"=>"Tazas",
            "description"=>"Tazas",
            "icon"=>"ni ni-active-40",
            "theme"=>"warning",
            "type"=>"horizontal",
        ],[
            "title"=>"Gorras",
            "description"=>"Gorras",
            "icon"=>"ni ni-satisfied",
            "theme"=>"info",
            "type"=>"horizontal",
        ],[
            "title"=>"Llaveros",
            "description"=>"Llaveros",
            "icon"=>"ni ni-satisfied",
            "theme"=>"danger",
            "type"=>"horizontal",
        ]] as $key => $value) {
            $homeSectionCard = new HomeSectionCard();
            $homeSectionCard->title=$value["title"];
            $homeSectionCard->description=$value["description"];
            $homeSectionCard->icon=$value["icon"];
            $homeSectionCard->theme=$value["theme"];
            $homeSectionCard->type=$value["type"];
            $homeSectionCard->id_home_section=$homeSection->id;
            $homeSectionCard->save();
        }
    }
    private function quotesSection(){
        $homeSection = new HomeSection();
        $homeSection->key="quotes";
        $homeSection->theme="gradient-info";
        $homeSection->icon_side="ni ni-settings";
        $homeSection->icon_side_theme="warning";
        $homeSection->title_side="Cotizaciones";
        $homeSection->description_side="Cotizamos tus pedidos con los mejores precios";
        $homeSection->save();
        foreach ([[
            "title"=>"Cotizaciones de pedidos",
            "description"=>"Cotizaciones de pedidos",
            "image"=>"https://www.marbenabogados.com/wp-content/uploads/2020/01/Base-de-Cotizaci%C3%B3n.jpg",
            "type"=>"vertical",
        ]] as $key => $value) {
            $homeSectionCard = new HomeSectionCard();
            $homeSectionCard->title=$value["title"];
            $homeSectionCard->description=$value["description"];
            $homeSectionCard->image=$value["image"];
            $homeSectionCard->type=$value["type"];
            $homeSectionCard->id_home_section=$homeSection->id;
            $homeSectionCard->save();
        }
    }
    private function clothingSection(){
        $homeSection = new HomeSection();
        $homeSection->key="clothing";
        $homeSection->theme="gradient-danger";
        $homeSection->icon_side="ni ni-building text-white";
        $homeSection->icon_side_theme="danger";
        $homeSection->title_side="Confecciones";
        $homeSection->description_side="Confeccionamos tus pedidos...";
        $homeSection->save();
        foreach ([[
            "image"=>"https://i.pinimg.com/474x/dc/d5/12/dcd512b790614fcdc3b219eb97649c37.jpg",
        ], [
            "image"=>"https://i.pinimg.com/550x/b9/79/bf/b979bf5aa8b76b378816de5bfa36f977.jpg",
        ], [
            "image"=>"https://i.pinimg.com/550x/fe/7e/7b/fe7e7b9ffd5d2d17a64627d2aa314357.jpg",
        ]] as $key => $value) {
            $homeSectionCarouselItem = new HomeSectionCarouselItem();
            $homeSectionCarouselItem->image=$value["image"];
            $homeSectionCarouselItem->id_home_section=$homeSection->id;
            $homeSectionCarouselItem->save();
        }
        foreach ([[
            "title"=>"Uniformes",
            "description"=>"Uniformes",
            "icon"=>"ni ni-satisfied",
            "theme"=>"info",
            "type"=>"horizontal",
        ],[
            "title"=>"Camisas",
            "description"=>"Camisas",
            "icon"=>"ni ni-satisfied",
            "theme"=>"success",
            "type"=>"horizontal",
        ],[
            "title"=>"Sweaters",
            "description"=>"Sweaters",
            "icon"=>"ni ni-active-40",
            "theme"=>"warning",
            "type"=>"horizontal",
        ],] as $key => $value) {
            $homeSectionCard = new HomeSectionCard();
            $homeSectionCard->title=$value["title"];
            $homeSectionCard->description=$value["description"];
            $homeSectionCard->icon=$value["icon"];
            $homeSectionCard->theme=$value["theme"];
            $homeSectionCard->type=$value["type"];
            $homeSectionCard->id_home_section=$homeSection->id;
            $homeSectionCard->save();
        }
    }
    private function catalogSection(){
        $homeSection = new HomeSection();
        $homeSection->key="catalog";
        $homeSection->theme="gradient-success";
        $homeSection->title="Catálogo de productos";
        $homeSection->description="Catálogo de productos";
        $homeSection->save();
        foreach ([[
            "title"=>"Ver todos los productos del catálogo",
            "description"=>"Puedes ver más productos de nuestro catálogo, añadirlos al carrito de compra, y comprarlos cuando quieras...",
            "type"=>"horizontal",
            "theme"=>"info",
        ]] as $key => $value) {
            $homeSectionCard = new HomeSectionCard();
            $homeSectionCard->title=$value["title"];
            $homeSectionCard->description=$value["description"];
            $homeSectionCard->type=$value["type"];
            $homeSectionCard->theme=$value["theme"];
            $homeSectionCard->id_home_section=$homeSection->id;
            $homeSectionCard->save();
        }
        foreach ([0,1,2] as $key => $value) {
            $product= Product::inRandomOrder()->first();
            $homeSectionProductCard = new HomeSectionProductCard();
            $homeSectionProductCard->id_product = $product->id;
            $homeSectionProductCard->id_home_section= $homeSection->id;
            $homeSectionProductCard->save();
        }
    }
    private function promotionsSection(){
        $homeSection = new HomeSection();
        $homeSection->key="promotions";
        $homeSection->theme="gradient-success";
        $homeSection->title="Promociones";
        $homeSection->description="Aprovecha nuestras promociones";
        $homeSection->save();
        foreach ([[
            "image"=>"https://www.kindpng.com/picc/m/427-4274672_ofertas-y-promociones-png-transparent-png.png",
            "title"=>"Promoción 1",
            "description"=>"Promoción 1",
        ], [
            "image"=>"https://www.kindpng.com/picc/m/133-1333287_ofertas-y-promociones-png-transparent-png.png",
            "title"=>"Promoción 2",
            "description"=>"Promoción 2",
        ], [
            "image"=>"https://www.kindpng.com/picc/m/250-2508312_ofertas-graphic-design-hd-png-download.png",
            "title"=>"Promoción 3",
            "description"=>"Promoción 3",
        ], [
            "image"=>"https://www.kindpng.com/picc/m/211-2116558_de-ofertas-hd-png-download.png",
            "title"=>"Promoción 4",
            "description"=>"Promoción 4",
        ]] as $key => $value) {
            $homeSectionCarouselItem = new HomeSectionCarouselItem();
            $homeSectionCarouselItem->image=$value["image"];
            $homeSectionCarouselItem->title=$value["title"];
            $homeSectionCarouselItem->description=$value["description"];
            $homeSectionCarouselItem->id_home_section=$homeSection->id;
            $homeSectionCarouselItem->save();
        }
    }
    private function contactUsSection(){
        $homeSection = new HomeSection();
        $homeSection->key="contact-us";
        $homeSection->theme="gradient-default";
        $homeSection->title="Contáctanos";
        $homeSection->description="Ponte en contacto con nosotros";
        $homeSection->save();        
    }
    public function run()
    {
        $this->servicesSection();
        $this->designsSection(); 
        $this->impressionsSection();
        $this->quotesSection();
        $this->clothingSection();
        $this->catalogSection();
        $this->promotionsSection();
        $this->contactUsSection();
    }
}
