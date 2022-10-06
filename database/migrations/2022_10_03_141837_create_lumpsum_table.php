<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLumpsumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lumpsum', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lokasi_id')->unsigned()->index();
            $table->foreign('lokasi_id')->references('id')->on('lokasi')->onDelete('cascade');
            $table->integer('besaran_lumpsum');
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
        Schema::dropIfExists('lumpsum');
    }
}
