<?php

namespace portal;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    
	protected $table = 'Estado';

	public $timestamps = false;

	public function municipios() {
		return $this->hasMany('portal\Municipio');
	}

}
