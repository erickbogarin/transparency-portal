<?php 

namespace portal\Services;

use portal\Repositories\EmployerTransparenciaRepository;

use portal\Repositories\FileTransparenciaRepository;

use Storage;

class FileTransparenciaService
{

	private $employerTransparenciaRepository;
	private $fileTransparenciaRepository;

	public function __construct(EmployerTransparenciaRepository $employerTransparenciaRepository, FileTransparenciaRepository $fileTransparenciaRepository) 
	{
		$this->employerTransparenciaRepository = $employerTransparenciaRepository;
		$this->fileTransparenciaRepository = $fileTransparenciaRepository;
	}

	public function store($file, $tpId)
	{
		Storage::put($file->getClientOriginalName(), file_get_contents($file->getRealPath()));

		$fileSaved = $this->fileTransparenciaRepository->store($file);
		$this->employerTransparenciaRepository->updateFileId($tpId, $fileSaved->id);
	}

}