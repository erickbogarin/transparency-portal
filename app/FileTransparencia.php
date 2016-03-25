<?php

namespace portal;

use Illuminate\Database\Eloquent\Model;

class FileTransparencia extends Model
{
    protected $table = 'arquivo';

    public $timestamps = false;

 	protected $fillable = ['nome'];

 	public function transparencias() {
		return $this->hasMany('portal\Transparencia');
	}
}
