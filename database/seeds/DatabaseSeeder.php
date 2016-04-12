<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(CarrerasTableSeeder::class);
    	$this->call(HorariosTableSeeder::class);
    	$this->call(PerfilesTableSeeder::class);
    	$this->call(SedesTableSeeder::class);
    	$this->call(UsersTableSeeder::class);
    }
}
