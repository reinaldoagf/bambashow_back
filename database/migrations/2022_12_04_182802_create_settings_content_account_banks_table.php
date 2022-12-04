<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsContentAccountBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_content_account_banks', function (Blueprint $table) {
            $table->id();
            $table->enum('bank', [
                'mercantil', 
                'provincial', 
                'banco de venezuela', 
                'banco bicentenario',
                'banesco',
                'banco exterior',
                'banco nacional de crédito',
                'bod',
            ])->nullable()->default('banco de venezuela');
            $table->text('account_number')->nullable();
            $table->text('email')->nullable();
            $table->text('identity_card')->nullable();
            $table->text('phone')->nullable();
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
        Schema::dropIfExists('settings_content_account_banks');
    }
}
