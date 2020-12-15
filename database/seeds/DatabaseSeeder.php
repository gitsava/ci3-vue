<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
    	//$this->call(UsersTableSeeder::class);
    	$this->call(KecamatanSeeder::class);
    	$this->call(KelurahanSeeder::class);
    }
}
