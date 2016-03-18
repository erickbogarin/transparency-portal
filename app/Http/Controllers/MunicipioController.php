<?php namespace portal\Http\Controllers;

use Illuminate\Http\Request;

use portal\Http\Requests;

use portal\Municipio;

class MunicipioController extends Controller {

	public function index(Request $request) {
		$input = $request->all();
    	if($request->get('search')){
    		$municipios = Municipio::where("nome", "LIKE", "%{$request->get('search')}%")
    		->orderBy('nome', 'asc')->paginate(12);      
    	}else{
    		$municipios = Municipio::orderBy('nome', 'asc')->paginate(12);
    	}
    	return response($municipios);
	}
}