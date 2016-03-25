<?php 

namespace portal\Repositories;

use portal\FileTransparencia;

use Storage;

class FileTransparenciaRepository 
{

	private $fileTransparencia;

	public function __construct(FileTransparencia $fileTransparencia) 
	{
		$this->fileTransparencia = $fileTransparencia;
	}

	public function store($input) 
	{
		$file = new FileTransparencia();
		$file->nome = $input->getClientOriginalName();
		$file->save();
		return $file;
	}

	public function show($id) 
	{
		return FileTransparencia::find($id);
	}

	public function destroy($id)
	{
		return FileTransparencia::where('id', $id)->delete();
	}

}