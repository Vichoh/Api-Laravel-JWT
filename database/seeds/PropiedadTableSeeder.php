<?php

use Illuminate\Database\Seeder;

class PropiedadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propiedad')->insert([

        		'nombre'		=> 'Lautaro',
        		'descripción'	=> 'en lautaro',
        		'id_empresa'	=> 53,

        	]);
    }
}
