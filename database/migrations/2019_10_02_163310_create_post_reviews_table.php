<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_id');
            $table->integer('user_id');
            $table->integer('financial_value');
            $table->integer('review_score');
            $table->string('comment');
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
        Schema::dropIfExists('post_reviews');
    }
}
