<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('kd_jadwal');
            $table->bigInteger('kd_mobil')->unsigned();
            $table->foreign('kd_mobil')->references('kd_mobil')->on('mobil');
            $table->bigInteger('kd_tujuan')->unsigned();
            $table->foreign('kd_tujuan')->references('kd_tujuan')->on('tujuan');
            $table->bigInteger('kd_asal')->unsigned();
            $table->foreign('kd_asal')->references('kd_asal')->on('asal'); 
            $table->string('jam_berangkat');
            $table->string('jam_tiba');
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
        Schema::dropIfExists('jadwal');
    }
}
