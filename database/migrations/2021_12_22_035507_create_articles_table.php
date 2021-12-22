<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maincat_id');
            $table->foreign('maincat_id')->references('id')->on('article_categories')->onDelete('cascade');
            $table->unsignedBigInteger('subcat_id');
            $table->foreign('subcat_id')->references('id')->on('article_sub_categories')->onDelete('cascade');
             $table->string('title');
             $table->string('description', '1000');
             $table->string('like')->nullable();
             $table->string('comment')->nullable();
             $table->string('image');
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
        Schema::dropIfExists('articles');
    }
}
