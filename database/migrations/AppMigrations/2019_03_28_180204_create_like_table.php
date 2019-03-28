<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VideoLikes', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('liker_id')->unsigned()->default(0);
            $table->integer('video_id')->unsigned()->default(0);
            $table->integer('videoer_id')->unsigned()->default(0);
            $table->foreign('liker_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('videoer_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('VideoLikes');
    }
}
