<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Videos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->string('video_title');
            $table->string('video_name');
            $table->string('hash_tag');
            $table->string('facebook_id');
            $table->string('email');
            $table->string('username');
            $table->string('address');
            $table->string('unique_user_hashtag');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('Videos');
    }
}
