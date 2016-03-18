<?php

namespace portal;

use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
 	protected $table = 'Orgao';

 	public $timestamps = false;

 	public function transparencias() {
		return $this->hasMany('portal\Municipio');
	}
}
