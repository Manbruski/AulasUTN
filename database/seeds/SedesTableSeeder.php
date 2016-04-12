<?php

use Illuminate\Database\Seeder;
use App\Sede;

class SedesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sedes = [
	    	['descripcion'=> 'Atenas'],
	    	['descripcion'=> 'Pacífico'],
	    	['descripcion'=> 'Guanacaste'],
	    	['descripcion'=> 'San Carlos'],
	    	['descripcion'=> 'Central']
    	];
    	foreach ($sedes as $sede) {
    		Sede::create($sede);
    	}
    }
}
