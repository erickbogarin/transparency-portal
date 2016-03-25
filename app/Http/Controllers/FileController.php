<?php

namespace portal\Http\Controllers;

use Illuminate\Http\Request;

use portal\Http\Requests;

use Validator;

use File;

use Response;

use Storage;

class FileController extends Controller
{

    /**
     * Store a file.
     *
     * @return simple JSON response message
     */
    public function store(Request $input)
    {
    	$file = $input->file('file');

    	$validator = Validator::make($input->all(), [
    	   'file' => 'max:2000|mimes:pdf|required'
        ]);

    	if ($validator->fails()) 
        {
    		return response('Falha ao enviar o arquivo.', 400);
    	}

        Storage::put($input->fileName, file_get_contents($file->getRealPath()));
        return response()->json(['success' => true], 200);
    }

    public function find($fileName) 
    {    
        if (! Storage::exists($fileName)) 
        {
            return response('Arquivo não encontrado.', 404);
        }

        $file = Storage::disk('local')->get($fileName);
        return response($file, 200)->header('Content-Type', 'application/pdf');
    }

}