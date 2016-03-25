<?php

namespace portal\Services;

use portal\Repositories\EmployerTransparenciaRepository;

use portal\Repositories\FileTransparenciaRepository;

use Storage;

class EmployerTransparenciaService 
{
	private $employerTransparenciaRepository;
	private $fileTransparenciaRepository;

    public function __construct(EmployerTransparenciaRepository $employerTransparenciaRepository, FileTransparenciaRepository $fileTransparenciaRepository) 
    {
        $this->employerTransparenciaRepository = $employerTransparenciaRepository;
        $this->fileTransparenciaRepository = $fileTransparenciaRepository;
    }

	public function index($input) 
	{
		if ($input->has('date')) 
			return $this->employerTransparenciaRepository->userDateTransparencias($input->user, $input->municipio, $input->orgao, $input->date);
		else 
			return $this->employerTransparenciaRepository->userTransparencias($input->user, $input->municipio, $input->orgao);
	}

	public function destroy($id) 
	{
		$transparencia = $this->employerTransparenciaRepository->show($id);
		Storage::delete($transparencia->link);
		return $this->employerTransparenciaRepository->destroy($id);
	}
 
}