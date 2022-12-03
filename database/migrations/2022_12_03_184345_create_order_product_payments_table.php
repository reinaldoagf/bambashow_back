<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product_payments', function (Blueprint $table) {
            $table->id();        
            $table->string('code');
            $table->float('amount')->default(1);
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->unsignedBigInteger('id_order_product');
            $table->foreign('id_order_product')
                ->references('id')->on('order_products')
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
        Schema::dropIfExists('order_product_payments');
    }
}
