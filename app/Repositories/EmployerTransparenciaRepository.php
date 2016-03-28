<?php

namespace portal\Repositories;

use portal\Transparencia;

use DB;

use Auth;

class EmployerTransparenciaRepository
{
	
	private $transparencia;

	public function __construct(Transparencia $transparencia) 
	{
		$this->transparencia = $transparencia;
	}

	public function userDateTransparencias($date)
	{
		return Transparencia::
			select('transparencia.*', 'tipo_transparencia.nome as tipo_nome')
			->leftJoin('tipo_transparencia', 'tipo_transparencia.id', '=', 'transparencia.tipo_id')
			->where([
				['usuario_id', Auth::user()->id],
				['municipio_id',Auth::user()->municipio_id],
				['orgao_id',Auth::user()->orgao_id],
				[DB::raw('DATE_FORMAT(transparencia.data, "%m/%Y")'), 'LIKE', "%{$date}"],
				])
			->orderBy('data', 'DESC')->paginate(10);      
	}

	public function userTransparencias()
	{
		return Transparencia::
			select('transparencia.*', 'tipo_transparencia.nome as tipo_nome')
			->join('tipo_transparencia', 'tipo_transparencia.id', '=', 'transparencia.tipo_id')
			->where([
				['usuario_id', Auth::user()->id],
				['municipio_id',Auth::user()->municipio_id],
				['orgao_id',Auth::user()->orgao_id],
				])
			->orderBy('data', 'DESC')->paginate(10);
	}

	public function store($input)
	{			
		return Transparencia::create($input);
	}

	public function show($id)
	{
    	return Transparencia::find($id);
	}

	public function edit($id)
	{
		return Transparencia::find($id);
	}

	public function update($input, $id)
	{
		$transparencia = Transparencia::where("id",$id)->update($input);
		return Transparencia::
		select('transparencia.*', 'tipo_transparencia.nome as tipo_nome')
		->leftJoin('tipo_transparencia', 'tipo_transparencia.id', '=', 'transparencia.tipo_id')
		->find($id);
	}

	public function updateFileId($id, $fileId) {
		Transparencia::where("id",$id)->update(['arquivo_id' => $fileId]);
	}

	public function destroy($id)
	{
		return Transparencia::where('id',$id)->delete();
	}

}