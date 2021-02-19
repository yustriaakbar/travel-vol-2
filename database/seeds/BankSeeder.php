<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank')->insert([
        	'nasabah_bank' => 'Admin Travel',
        	'nama_bank' => 'BNI',
        	'rekening_bank' => '8-888-888-888',
        	'photo' => 'frontend/img/bank/bni-icon.jpg',
        ]);

        DB::table('bank')->insert([
        	'nasabah_bank' => 'Admin Travel',
        	'nama_bank' => 'MANDIRI',
        	'rekening_bank' => '8-888-888-888',
        	'photo' => 'frontend/img/bank/mandiri-icon.jpg',
        ]);

        DB::table('bank')->insert([
        	'nasabah_bank' => 'Admin Travel',
        	'nama_bank' => 'BCA',
        	'rekening_bank' => '8-888-888-888',
        	'photo' => 'frontend/img/bank/bca-icon.jpg',
        ]);

        DB::table('bank')->insert([
        	'nasabah_bank' => 'Admin Travel',
        	'nama_bank' => 'BRI',
        	'rekening_bank' => '8-888-888-888',
        	'photo' => 'frontend/img/bank/bri-icon.jpg',
        ]);
    }
}
