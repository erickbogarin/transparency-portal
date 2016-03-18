<?php

namespace portal;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{

	protected $table = 'Municipio';

	public $timestamps = false;

	protected $guarded = ['id'];

	public function estado() {
		return $this->belongTo('portal\Estado');
	}
	public function users() {
		return $this->hasMany('portal\User');
	}
	public function transparencias() {
		return $this->hasMany('portal\Transparencia');
	}
}
