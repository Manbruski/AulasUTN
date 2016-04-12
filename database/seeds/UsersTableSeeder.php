<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create(['name' => 'Pendiente',
    		'celular' 		 => '+50686660012',
    		'email'          => 'root.admtiempos@gmail.com',
    		'perfil_id'      => 1,
    		'es_docente'     => false,
    		'activo'   		 => true,
    		'password' 		 => bcrypt('123456')]);
    }
}
