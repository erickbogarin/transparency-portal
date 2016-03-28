<?php

namespace portal\Http\Controllers;

use Illuminate\Http\Request;

use portal\Http\Requests;

use portal\Orgao;

class OrgaoController extends Controller
{
    
	public function index() 
	{
		return Orgao::all();
	}

}
