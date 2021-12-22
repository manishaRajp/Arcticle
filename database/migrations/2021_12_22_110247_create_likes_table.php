<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('art_id');
             $table->foreign('art_id')->references('id')->on('articles')->onDelete('cascade');
             $table->unsignedBigInteger('user_id');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->string('status');
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
        Schema::dropIfExists('likes');
    }
}
