<?php

use Illuminate\Database\Seeder;
use App\Perfil;

class PerfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create(['id' => 1, 'nombre' => 'Administrador']);
        Perfil::create(['id' => 2, 'nombre' => 'Usuario']);
    }
}
