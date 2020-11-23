<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id_order');
            $table->string('kd_order');
            $table->string('kd_tiket');
            $table->bigInteger('kd_jadwal')->unsigned();
            $table->foreign('kd_jadwal')->references('kd_jadwal')->on('jadwal');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->bigInteger('kd_bank')->unsigned();
            $table->foreign('kd_bank')->references('kd_bank')->on('bank');
            //$table->string('nama_pemesan_tiket');
            $table->string('tgl_beli_order');
            $table->string('tgl_berangkat_order');
            $table->string('nama_penumpang');
            $table->string('ktp_penumpang');
            $table->string('no_kursi_penumpang');
            //$table->string('no_ktp_order');
            //$table->string('no_tlp_order');
            //$table->string('alamat_order');
            $table->string('expired_order');
            $table->string('status_order');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
