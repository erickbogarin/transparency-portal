<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransparenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transparencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 45);
            $table->dateTime('data');
            $table->string('link', 100);
            $table->enum('tipo', ['Receitas', 'Despesas', 'Balancos', 'LRF - Responsabilidade Fiscal', 'Planejamento Orcamentario', 'Convenios', 'Contratos e Licitacoes', 'Servidores', 'Atos Oficiais', 'Secretarias e Orgaos']);
            $table->integer('municipio_id');
            $table->integer('orgao_id');
            $table->integer('usuario_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Transparencia');
    }
}
