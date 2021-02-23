<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_number');
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->string('description');
            $table->string('source');
            $table->boolean('is_preview')->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('courses_videos');
    }
}
