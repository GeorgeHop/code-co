<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site', function (Blueprint $table) {
            $table->string('site_name');
            $table->string('mail_box');
            $table->string('telegram');
            $table->string('telegram_description');
            $table->string('instagram');
            $table->string('instagram_description');
            $table->string('viber');
            $table->string('viber_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site');
    }
}
