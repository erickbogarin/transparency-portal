<?php namespace portal\Http\Controllers;

use Request;
use portal\Municipio;

class MunicipioController extends Controller {

	public function index() {
		$municipios = Municipio::all();
		return response()->json($municipios);
	}
}