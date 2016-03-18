<?php

namespace portal;

use Illuminate\Database\Eloquent\Model;

class TipoTransparencia extends Model
{
    protected $table = 'tipo_transparencia';

    public $timestamps = false;

    public function transparencias() {
    	return $this->hasMany('portal\Transparencia');
    }

}
