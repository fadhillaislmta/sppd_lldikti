<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeupusatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keupusat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->index();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('lumpsum_id')->unsigned()->index();
            $table->foreign('lumpsum_id')->references('id')->on('lumpsum')->onDelete('cascade');
            $table->bigInteger('pusat_id')->unsigned()->index();
            $table->foreign('pusat_id')->references('id')->on('pusat')->onDelete('cascade');
            $table->integer('uang_transport');
            $table->integer('uang_penginapan');
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
        Schema::dropIfExists('keupusat');
    }
}
