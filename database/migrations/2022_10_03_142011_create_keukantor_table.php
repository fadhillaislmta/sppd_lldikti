<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeukantorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keukantor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->index();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('lumpsum_id')->unsigned()->index();
            $table->foreign('lumpsum_id')->references('id')->on('lumpsum')->onDelete('cascade');
            $table->bigInteger('kantor_id')->unsigned()->index();
            $table->foreign('kantor_id')->references('id')->on('kantor')->onDelete('cascade');
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
        Schema::dropIfExists('keukantor');
    }
}
