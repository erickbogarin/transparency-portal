<?php 

namespace portal\Repositories;

use portal\Transparencia;

use DB;

class TransparenciasRepository 
{

	private $transparencia;

	public function __construct(Transparencia $transparencia) 
	{
		$this->transparencia = $transparencia;
	}

	public function index($municipio, $orgao) 
	{	
		return Transparencia::select('transparencia.nome', 'transparencia.data', 'transparencia.link')
            ->join('municipio', 'transparencia.municipio_id', '=', 'municipio.id')
            ->join('orgao', 'transparencia.orgao_id', '=', 'orgao.id')
            ->where([
                ['municipio.nome',$municipio],
                ['orgao.nome',$orgao],
            ])
			->orderBy('data', 'DESC')->paginate(10);      
	}

	public function transparenciasByDate($municipio, $orgao, $date) 
	{	
		return Transparencia::select('transparencia.nome', 'transparencia.data', 'transparencia.link')
            ->join('municipio', 'transparencia.municipio_id', '=', 'municipio.id')
            ->join('orgao', 'transparencia.orgao_id', '=', 'orgao.id')
            ->where([
                ['municipio.nome',$municipio],
                ['orgao.nome',$orgao],
				[DB::raw('DATE_FORMAT(data, "%m/%Y")'), 'LIKE', "%{$date}"],
			])
			->orderBy('data', 'DESC')->paginate(10);      
	}


	public function transparenciasByType($municipio, $orgao, $type) 
	{	
		return Transparencia::select('transparencia.nome', 'transparencia.data', 'transparencia.link', 'tipo_transparencia.nome as tipo_nome')
            ->join('municipio', 'transparencia.municipio_id', '=', 'municipio.id')
            ->join('orgao', 'transparencia.orgao_id', '=', 'orgao.id')
            ->join('tipo_transparencia', 'tipo_transparencia.id', '=', 'transparencia.tipo_id')
            ->where([
                ['municipio.nome',$municipio],
                ['orgao.nome',$orgao],
				['tipo_id', $type],
			])
			->orderBy('data', 'DESC')->paginate(10);      
	}

	public function transparenciasByTypeDate($municipio, $orgao, $type, $date) 
	{	
		return Transparencia::select('transparencia.nome', 'transparencia.data', 'transparencia.link', 'tipo_transparencia.nome as tipo_nome')
            ->join('municipio', 'transparencia.municipio_id', '=', 'municipio.id')
            ->join('orgao', 'transparencia.orgao_id', '=', 'orgao.id')
            ->join('tipo_transparencia', 'tipo_transparencia.id', '=', 'transparencia.tipo_id')
            ->where([
                ['municipio.nome',$municipio],
                ['orgao.nome',$orgao],
				['tipo_id', $type],
				[DB::raw('DATE_FORMAT(data, "%m/%Y")'), 'LIKE', "%{$date}"],
			])
			->orderBy('data', 'DESC')->paginate(10);      
	}

}