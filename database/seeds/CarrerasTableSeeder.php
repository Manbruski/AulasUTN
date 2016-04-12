<?php

use Illuminate\Database\Seeder;
use App\Carrera;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$carreras = [
	    	['nombre'=>'Administración Aduanera', 'codigo'=>'AA'], 
	    	['nombre'=>'Administración y Gestión de Recursos Humanos', 'codigo'=>'AGRH'],
	    	['nombre'=>'Asistencia Administrativa', 'codigo'=>'ASA'],
	    	['nombre'=>'Comercio Exterior', 'codigo'=>'COEX'],
	    	['nombre'=>'Ingeniería del Software', 'codigo'=>'ISW'],
	    	['nombre'=>'Ingeniería en Gestión Ambiental', 'codigo'=>'IGA'],
	    	['nombre'=>'Ingeniería en Salud Ocupacional y Ambiente', 'codigo'=>'ISOA'],
	    	['nombre'=>'Inglés como Lengua Extranjera', 'codigo'=>'ILE'],
	    	['nombre'=>'Formación Humanística', 'codigo'=>'FH'],
	    	['nombre'=>'Actividad Cultural', 'codigo'=>'AC'],
	    	['nombre'=>'Actividad Deportiva', 'codigo'=>'AD'],
	    	['nombre'=>'Ciencias Básicas', 'codigo'=>'CB'],
	    	['nombre'=>'Matemáticas y Estadísticas', 'codigo'=>'ME'],
	    	['nombre'=>'Programa de Idiomas', 'codigo'=>'PIT'],
	    	['nombre'=>'Extensión', 'codigo'=>'Ext']
    	];
    	foreach ($carreras as $carrera) {
    		Carrera::create($carrera);
    	}
    }
}
