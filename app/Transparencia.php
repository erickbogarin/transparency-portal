<?php

namespace portal;

use Illuminate\Database\Eloquent\Model;


class Transparencia extends Model
{
    protected $table = 'Transparencia';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function municipio() {
		return $this->belongTo('portal\Municipio');
	}

	public function orgao() {
		return $this->belongTo('portal\Orgao');
	}

	public function user() {
		return $this->belongsTo('portal\User');
	}

	public function tipoTransparencia() {
		return $this->belongsTo('portal\TipoTransparencia');
	}

	public function file() {
		return $this->belongsTo('portal\FileTransparencia');
	}

}
