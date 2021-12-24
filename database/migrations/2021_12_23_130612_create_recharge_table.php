<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('post_id');
             $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
             $table->unsignedBigInteger('user_id')->comment('User name');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
              $table->string('points')->default(0);
             $table->enum('status', ['0', '1'])->default(1)->comment('0 =Approve, 1=pending');
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
        Schema::dropIfExists('recharge');
    }
}
