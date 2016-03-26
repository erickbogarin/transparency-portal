<?php

namespace portal\Services;

use portal\Repositories\TransparenciasRepository;

class TransparenciasService  
{

	private $transparenciasRepository;

	public function __construct(TransparenciasRepository $transparenciasRepository) 
	{
		$this->transparenciasRepository = $transparenciasRepository;
	}

	public function index($input) 
	{	
		if ($input->has('type') && $input->has('date')) 
			return $this->transparenciasRepository
				->transparenciasByTypeDate($input->municipio, $input->orgao, $input->type, $input->date);
		else if($input->has('type'))
			return $this->transparenciasRepository
				->transparenciasByType($input->municipio, $input->orgao, $input->type);
		else if($input->has('date'))
			return $this->transparenciasRepository
				->transparenciasByDate($input->municipio, $input->orgao, $input->date);
		else 
			return $this->transparenciasRepository->index($input->municipio, $input->orgao); 		
	}

}