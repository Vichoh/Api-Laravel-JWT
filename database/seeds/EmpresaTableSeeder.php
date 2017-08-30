<?php

use Illuminate\Database\Seeder;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresa')->insert([

        	'nombre' 	=> 'Aguayo',
        	'email'		=> 'aguayo@gmial.com',
        	'descripcion'	=> 'Empresa temuco',
        	'web'			=> 'www.AguayoCorredora.cl',
        	'telefono'		=> '98754213',
        	'id_users'		=> 1



        ]);
    }
}
