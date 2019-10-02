<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->integer('user_id')->primary();
            $table->integer('area_id')->nullable();
            $table->string('address')->nullable();
            $table->integer('map_location_id')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('occupation')->nullable();
            $table->string('description')->nullable();
            $table->integer('photo_id')->nullable();
            $table->integer('weight')->nullable();
            $table->boolean('active_status')->nullable();
            $table->integer('marital_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
