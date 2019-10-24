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
            $table->integer('area_id');
            $table->string('address');
            $table->integer('map_location_id');
            $table->string('blood_group');
            $table->date('birthday');
            $table->string('gender');
            $table->string('occupation');
            $table->string('description')->default(' ');
            $table->integer('photo_id')->nullable();
            $table->integer('weight')->nullable();
            $table->String('active_status');
            $table->string('marital_status')->default('Single');
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
        Schema::dropIfExists('user_infos');
    }
}
