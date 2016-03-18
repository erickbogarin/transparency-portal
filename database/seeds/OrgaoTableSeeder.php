<?php

use Illuminate\Database\Seeder;
use portal\Orgao;

class OrgaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orgao::insert(['nome' => 'prefeitura');       
        Orgao::insert(['nome' => 'camara');
    }
}
