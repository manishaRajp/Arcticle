<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechargedetails', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('post_id');
             $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
             $table->unsignedBigInteger('user_id');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->string('points')->comment('  total point of post');
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
        Schema::dropIfExists('rechargedetails');
    }
}
