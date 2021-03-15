<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesGroupsVideosAccess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_groups_videos_access', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_open')->default(0);
            $table->unsignedBigInteger('user_group_id');
            $table->unsignedBigInteger('video_id');
            $table->foreign('user_group_id')->references('id')->on('groups');
            $table->foreign('video_id')->references('id')->on('courses_videos');
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
