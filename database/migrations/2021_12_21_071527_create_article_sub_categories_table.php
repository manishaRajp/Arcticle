<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maincat_id')->comment('main category id');
            $table->foreign('maincat_id')->references('id')->on('article_categories')->onDelete('cascade');
            $table->string('sub_name')->comment('Article sub category name');
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
        Schema::dropIfExists('article_sub_categories');
    }
}
