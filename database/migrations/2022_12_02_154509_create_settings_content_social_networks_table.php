<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsContentSocialNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_content_social_networks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->text('url')->nullable();
            $table->text('tooltip')->nullable();
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
        Schema::dropIfExists('settings_content_social_networks');
    }
}
