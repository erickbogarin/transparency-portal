<?php 

namespace portal\Formatters;

class FileFormatter
{

	private function clear($fileName) {
		$fileName = preg_replace('/\s\s+/', ' ', $fileName);
        $fileName = strtolower($fileName); 
        $fileName = str_replace(' ', '-', $fileName);
        return $fileName;
	}

	private function defineNameFile($input) {
		return $input->id . '-' . $input->name  . '.pdf';
	}

	public function formatFileName($input) {
		$fileName = $this->defineNameFile($input);
        return $this->clear($fileName);
	}

}