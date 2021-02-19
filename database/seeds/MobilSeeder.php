<?php

use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobil')->insert([
        	'nama_mobil' => 'ELF2009',
        	'plat_mobil' => 'AG 33 BLN',
        	'kapasitas_mobil' => '14',
        	'status' => '1',
        ]);

        DB::table('mobil')->insert([
        	'nama_mobil' => 'ELF2010',
        	'plat_mobil' => 'AG 44 BLN',
        	'kapasitas_mobil' => '14',
        	'status' => '1',
        ]);

        DB::table('mobil')->insert([
        	'nama_mobil' => 'ELF2011',
        	'plat_mobil' => 'AG 55 BLN',
        	'kapasitas_mobil' => '14',
        	'status' => '1',
        ]);

        DB::table('mobil')->insert([
        	'nama_mobil' => 'ELF2012',
        	'plat_mobil' => 'AG 66 BLN',
        	'kapasitas_mobil' => '14',
        	'status' => '1',
        ]);
    }
}
