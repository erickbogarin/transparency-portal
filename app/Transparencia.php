<?php

namespace portal;

use Illuminate\Database\Eloquent\Model;

class Transparencia extends Model
{
    protected $table = 'Transparencia';

    public $timestamps = false;

 	protected $fillable = ['nome', 'data', 'link', 'orgao_id', 'municipio_id', 'tipo_id'];   

    protected $guarded = ['id'];

    public function municipio() {
		return $this->belongTo('portal\Municipio');
	}
	public function orgao() {
		return $this->belongTo('portal\Orgao');
	}

	public function user() {
		return $this->belongTo('portal\User');
	}

	public function tipoTransparencia() {
		return $this->belongsTo('portal\TipoTransparencia', 'id');
	}

}
