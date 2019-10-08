<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('sub_title');
            $table->text('description');
            $table->integer('area_id');
            $table->string('address');
            $table->integer('map_location_id');
            $table->integer('quality')->default(1);
            $table->string('mobile');
            $table->string('post_status');
            $table->string('post_type')->default('Donate');
            $table->integer('financial_value');
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
        Schema::dropIfExists('posts');
    }
}
