<?php namespace portal\Http\Controllers;

use portal\Municipio;


class IndexController extends Controller{

	public function index() {
		return view('index');
	}
}