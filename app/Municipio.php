<?php

namespace portal;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{

	protected $table = 'municipio';

	public $timestamps = false;

	protected $fillable = ['nome'];
	protected $guarded = ['id'];
}
