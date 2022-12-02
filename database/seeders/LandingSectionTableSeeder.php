<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\LandingSection;
use App\Models\LandingSectionListItem;
use App\Models\LandingSectionCard;
use App\Models\LandingSectionCarouselItem;
use App\Models\LandingSectionProductCard;

class LandingSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function servicesSection(){
        $landingSection = new LandingSection();
        $landingSection->key="services";
        $landingSection->icon_side="ni ni-settings-gear-65";
        $landingSection->icon_side_theme="success";
        $landingSection->title_side="Servicios";
        $landingSection->description_side="Tenemos las mejores promociones";
        $landingSection->image_side="https://static.vecteezy.com/system/resources/previews/001/197/380/non_2x/promotion-ribbon-png.png";
        $landingSection->save();
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
            $landingSectionListItem = new LandingSectionListItem();
            $landingSectionListItem->text=$value["text"];
            $landingSectionListItem->icon=$value["icon"];
            $landingSectionListItem->theme=$value["theme"];
            $landingSectionListItem->id_landing_section=$landingSection->id;
            $landingSectionListItem->save();
        }
    }
    private function designsSection(){
        $landingSection = new LandingSection();
        $landingSection->key="designs";
        $landingSection->theme="gradient-info";
        $landingSection->icon_side="ni ni-settings";
        $landingSection->icon_side_theme="success";
        $landingSection->title_side="Diseños";
        $landingSection->description_side="Diseñamos nuestros productos";
        $landingSection->save();
        foreach ([[
            "title"=>"Diseños según pedidos del cliente",
            "description"=>"Diseños según pedidos del cliente",
            "image"=>"https://impulsapopular.com/wp-content/uploads/2019/07/4525-Herramientas-digitales-para-el-dise%C3%B1o-gr%C3%A1fico.jpg",
            "type"=>"vertical",
        ]] as $key => $value) {
            $landingSectionCard = new LandingSectionCard();
            $landingSectionCard->title=$value["title"];
            $landingSectionCard->description=$value["description"];
            $landingSectionCard->image=$value["image"];
            $landingSectionCard->type=$value["type"];
            $landingSectionCard->id_landing_section=$landingSection->id;
            $landingSectionCard->save();
        }
    }
    private function impressionsSection(){
        $landingSection = new LandingSection();
        $landingSection->key="impressions";
        $landingSection->theme="gradient-warning";
        $landingSection->icon_side="ni ni-building text-white";
        $landingSection->icon_side_theme="warning";
        $landingSection->title_side="Impresiones";
        $landingSection->description_side="Hacemos impresiones en franelas, tazas, llaveros...";
        $landingSection->save();
        foreach ([[
            "image"=>"https://i.pinimg.com/474x/dc/d5/12/dcd512b790614fcdc3b219eb97649c37.jpg",
        ], [
            "image"=>"https://i.pinimg.com/550x/b9/79/bf/b979bf5aa8b76b378816de5bfa36f977.jpg",
        ], [
            "image"=>"https://i.pinimg.com/550x/fe/7e/7b/fe7e7b9ffd5d2d17a64627d2aa314357.jpg",
        ]] as $key => $value) {
            $landingSectionCarouselItem = new LandingSectionCarouselItem();
            $landingSectionCarouselItem->image=$value["image"];
            $landingSectionCarouselItem->id_landing_section=$landingSection->id;
            $landingSectionCarouselItem->save();
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
            $landingSectionCard = new LandingSectionCard();
            $landingSectionCard->title=$value["title"];
            $landingSectionCard->description=$value["description"];
            $landingSectionCard->icon=$value["icon"];
            $landingSectionCard->theme=$value["theme"];
            $landingSectionCard->type=$value["type"];
            $landingSectionCard->id_landing_section=$landingSection->id;
            $landingSectionCard->save();
        }
    }
    private function quotesSection(){
        $landingSection = new LandingSection();
        $landingSection->key="quotes";
        $landingSection->theme="gradient-info";
        $landingSection->icon_side="ni ni-settings";
        $landingSection->icon_side_theme="warning";
        $landingSection->title_side="Cotizaciones";
        $landingSection->description_side="Cotizamos tus pedidos con los mejores precios";
        $landingSection->save();
        foreach ([[
            "title"=>"Cotizaciones de pedidos",
            "description"=>"Cotizaciones de pedidos",
            "image"=>"https://www.marbenabogados.com/wp-content/uploads/2020/01/Base-de-Cotizaci%C3%B3n.jpg",
            "type"=>"vertical",
        ]] as $key => $value) {
            $landingSectionCard = new LandingSectionCard();
            $landingSectionCard->title=$value["title"];
            $landingSectionCard->description=$value["description"];
            $landingSectionCard->image=$value["image"];
            $landingSectionCard->type=$value["type"];
            $landingSectionCard->id_landing_section=$landingSection->id;
            $landingSectionCard->save();
        }
    }
    private function clothingSection(){
        $landingSection = new LandingSection();
        $landingSection->key="clothing";
        $landingSection->theme="gradient-danger";
        $landingSection->icon_side="ni ni-building text-white";
        $landingSection->icon_side_theme="danger";
        $landingSection->title_side="Confecciones";
        $landingSection->description_side="Confeccionamos tus pedidos...";
        $landingSection->save();
        foreach ([[
            "image"=>"https://i.pinimg.com/474x/dc/d5/12/dcd512b790614fcdc3b219eb97649c37.jpg",
        ], [
            "image"=>"https://i.pinimg.com/550x/b9/79/bf/b979bf5aa8b76b378816de5bfa36f977.jpg",
        ], [
            "image"=>"https://i.pinimg.com/550x/fe/7e/7b/fe7e7b9ffd5d2d17a64627d2aa314357.jpg",
        ]] as $key => $value) {
            $landingSectionCarouselItem = new LandingSectionCarouselItem();
            $landingSectionCarouselItem->image=$value["image"];
            $landingSectionCarouselItem->id_landing_section=$landingSection->id;
            $landingSectionCarouselItem->save();
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
            $landingSectionCard = new LandingSectionCard();
            $landingSectionCard->title=$value["title"];
            $landingSectionCard->description=$value["description"];
            $landingSectionCard->icon=$value["icon"];
            $landingSectionCard->theme=$value["theme"];
            $landingSectionCard->type=$value["type"];
            $landingSectionCard->id_landing_section=$landingSection->id;
            $landingSectionCard->save();
        }
    }
    private function catalogSection(){
        $landingSection = new LandingSection();
        $landingSection->key="catalog";
        $landingSection->theme="gradient-success";
        $landingSection->title="Catálogo de productos";
        $landingSection->description="Catálogo de productos";
        $landingSection->save();
        foreach ([[
            "title"=>"Ver todos los productos del catálogo",
            "description"=>"Puedes ver más productos de nuestro catálogo, añadirlos al carrito de compra, y comprarlos cuando quieras...",
            "type"=>"horizontal",
            "theme"=>"info",
        ]] as $key => $value) {
            $landingSectionCard = new LandingSectionCard();
            $landingSectionCard->title=$value["title"];
            $landingSectionCard->description=$value["description"];
            $landingSectionCard->type=$value["type"];
            $landingSectionCard->theme=$value["theme"];
            $landingSectionCard->id_landing_section=$landingSection->id;
            $landingSectionCard->save();
        }
        foreach ([0,1,2] as $key => $value) {
            $product= Product::inRandomOrder()->first();
            $landingSectionProductCard = new LandingSectionProductCard();
            $landingSectionProductCard->id_product = $product->id;
            $landingSectionProductCard->id_landing_section= $landingSection->id;
            $landingSectionProductCard->save();
        }
    }
    private function promotionsSection(){
        $landingSection = new LandingSection();
        $landingSection->key="promotions";
        $landingSection->theme="gradient-success";
        $landingSection->title="Promociones";
        $landingSection->description="Aprovecha nuestras promociones";
        $landingSection->save();
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
            $landingSectionCarouselItem = new LandingSectionCarouselItem();
            $landingSectionCarouselItem->image=$value["image"];
            $landingSectionCarouselItem->title=$value["title"];
            $landingSectionCarouselItem->description=$value["description"];
            $landingSectionCarouselItem->id_landing_section=$landingSection->id;
            $landingSectionCarouselItem->save();
        }
    }
    private function contactUsSection(){
        $landingSection = new LandingSection();
        $landingSection->key="contact-us";
        $landingSection->theme="gradient-default";
        $landingSection->title="Contáctanos";
        $landingSection->description="Ponte en contacto con nosotros";
        $landingSection->save();        
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
