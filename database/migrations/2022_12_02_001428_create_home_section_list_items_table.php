<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSectionListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_section_list_items', function (Blueprint $table) {
            $table->id();
            $table->text('text')->nullable();
            $table->string('icon')->nullable();
            $table->string('theme')->nullable();
            $table->unsignedBigInteger('id_home_section');
            $table->foreign('id_home_section')
                ->references('id')->on('home_sections')
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
        Schema::dropIfExists('home_section_list_items');
    }
}
