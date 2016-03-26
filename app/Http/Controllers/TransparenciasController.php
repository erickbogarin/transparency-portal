<?php

namespace portal\Http\Controllers;

use Illuminate\Http\Request;

use portal\Http\Requests;

use portal\Services\TransparenciasService;

class TransparenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TransparenciasService $transparenciasService, Request $request)
    {
        return $transparenciasService->index($request);
    }

}
