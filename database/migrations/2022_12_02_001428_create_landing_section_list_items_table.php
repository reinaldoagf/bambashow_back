<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingSectionListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_section_list_items', function (Blueprint $table) {
            $table->id();
            $table->text('text')->nullable();
            $table->string('icon')->nullable();
            $table->string('theme')->nullable();
            $table->unsignedBigInteger('id_landing_section');
            $table->foreign('id_landing_section')
                ->references('id')->on('landing_sections')
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
        Schema::dropIfExists('landing_section_list_items');
    }
}
