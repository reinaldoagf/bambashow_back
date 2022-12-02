<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSectionCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_section_cards', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->string('icon')->nullable();
            $table->string('theme')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->enum('type', ['horizontal', 'vertical'])->nullable()->default('horizontal');
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
        Schema::dropIfExists('home_section_cards');
    }
}
