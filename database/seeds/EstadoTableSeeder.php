<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use portal\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		 DB::table('Estado')->insert([
            'nome' => 'Pará',
            'uf' => 'PA',
        ]);
    }
}
