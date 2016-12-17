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
        Orgao::create(['nome' => 'prefeitura']);
        Orgao::create(['nome' => 'camara']);
    }
}
