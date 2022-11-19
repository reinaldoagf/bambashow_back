<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSupplierItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_supplier_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable();
            $table->integer('square_meter')->nullable();
            $table->unsignedBigInteger('id_order_supplier');
            $table->foreign('id_order_supplier')
                ->references('id')->on('order_suppliers')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_raw_material');
            $table->foreign('id_raw_material')
                ->references('id')->on('raw_materials')
                ->onDelete('cascade');                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_supplier_items');
    }
}
