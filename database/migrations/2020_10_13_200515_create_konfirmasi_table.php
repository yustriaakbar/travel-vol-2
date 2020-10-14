<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfirmasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi', function (Blueprint $table) {
            $table->bigIncrements('kd_konfirmasi');
            $table->bigInteger('kd_order')->unsigned();
            $table->foreign('kd_order')->references('id_order')->on('order');
            $table->string('nama_pemesan');
            $table->string('nama_bank');
            $table->string('rekening_bank');
            $table->string('total');
            $table->string('harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfirmasi');
    }
}
