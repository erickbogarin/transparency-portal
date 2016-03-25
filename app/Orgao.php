<?php

namespace portal;

use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
 	protected $table = 'orgao';

 	public $timestamps = false;

 	public function transparencias() {
		return $this->hasMany('portal\Municipio');
	}

	public function users() {
		return $this->hasMany('portal\User');
	}
}
