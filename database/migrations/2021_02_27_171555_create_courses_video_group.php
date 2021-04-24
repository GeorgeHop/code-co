<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesVideoGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_video_group', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_open')->default(0);
            $table->unsignedBigInteger('courses_video_id');
            $table->integer('group_id');
            $table->foreign('courses_video_id')->references('id')->on('courses_videos');
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
        Schema::dropIfExists('courses_groups_videos_access');
    }
}
