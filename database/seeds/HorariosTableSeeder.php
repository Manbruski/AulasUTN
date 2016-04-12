<?php

use Illuminate\Database\Seeder;
use App\Horario;
use Carbon\Carbon;

class HorariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horarios = [
	    	['nombre'=>'Mañana', 'hora_inicio'=>Carbon::createFromTime(8, 00, 0, 'America/Costa_Rica'),
	    	 'hora_fin'=>Carbon::createFromTime(11, 30, 0, 'America/Costa_Rica')], 
	    	['nombre'=>'Tarde', 'hora_inicio'=>Carbon::createFromTime(13, 30, 0, 'America/Costa_Rica'),
	    	 'hora_fin'=>Carbon::createFromTime(17, 00, 0, 'America/Costa_Rica')], 
	    	['nombre'=>'Noche', 'hora_inicio'=>Carbon::createFromTime(18, 00, 0, 'America/Costa_Rica'),
	    	 'hora_fin'=>Carbon::createFromTime(21, 30, 0, 'America/Costa_Rica')]
    	];
    	foreach ($horarios as $horario) {
    		Horario::create($horario);
    	}
    }
}
