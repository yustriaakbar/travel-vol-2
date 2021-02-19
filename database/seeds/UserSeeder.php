<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Admin',
        	'email' => 'admin@gmail.com',
        	'password' => Hash::make('123123123'),
        	'role' => 'admin',
        	'tlp' => '0821123123',
        	'no_ktp' => '3517301112980001',
        	'alamat' => 'Jl. Bumi Marina Emas Barat IV no. 61',
        ]);
    }
}
