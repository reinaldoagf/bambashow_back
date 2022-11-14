<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('message')->nullable();
            $table->string('filename')->nullable();
            $table->string('pdf')->nullable();
            $table->enum('status', ['en espera', 'aprobado', 'recibido', 'rechazado'])->nullable()->default('en espera');
            $table->unsignedBigInteger('id_provider');
            $table->foreign('id_provider')
                ->references('id')->default(2)->on('providers')
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
        Schema::dropIfExists('order_suppliers');
    }
}
