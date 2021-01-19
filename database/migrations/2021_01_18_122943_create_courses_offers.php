<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->integer('amount');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('cost')->nullable();
            $table->string('currency', 3);
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_offers');
    }
}
