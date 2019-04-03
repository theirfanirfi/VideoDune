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
            $table->string('video_title')->nullable();
            $table->string('video_name')->nullable();
            $table->string('hash_tag')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('address')->nullable();
            $table->string('unique_user_hashtag')->nullable();
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
