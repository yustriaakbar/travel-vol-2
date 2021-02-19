<?php

use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asal')->insert([
        	'kota_asal' => 'NGANJUK',
        	'nama_jalan' => 'Jl. Dr. Sutomo 6 No. 02 Bogo Kidul',
        ]);

        DB::table('tujuan')->insert([
        	'kota_tujuan' => 'SURABAYA',
        ]);

        DB::table('jadwal')->insert([
        	'kd_mobil' => '1',
        	'kd_tujuan' => '1',
        	'kd_asal' => '1',
        	'jam_berangkat' => '07:00:00',
        	'jam_tiba' => '09:30:00',
        	'harga' => '100000',
        ]);
    }
}
