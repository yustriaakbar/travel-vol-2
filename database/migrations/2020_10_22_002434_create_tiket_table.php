<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd_order');
            $table->string('kd_tiket');
            $table->bigInteger('kd_jadwal')->unsigned();
            $table->foreign('kd_jadwal')->references('kd_jadwal')->on('jadwal');
            $table->string('nama_tiket');
            $table->string('kursi_tiket');
            $table->string('ktp_penumpang');
            $table->string('harga_tiket');
            $table->string('photo_tiket');
            $table->string('status_tiket');
            $table->string('create_tgl_tiket');
            $table->string('create_admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket');
    }
}
