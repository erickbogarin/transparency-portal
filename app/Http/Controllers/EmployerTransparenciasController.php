<?php

namespace portal\Http\Controllers;

use Illuminate\Http\Request;

use portal\Http\Requests;

use portal\Transparencia;

use Auth;

use portal\Repositories\EmployerTransparenciaRepository;

use portal\Services\EmployerTransparenciaService;

class EmployerTransparenciasController extends Controller
{
    
    private $employerTransparenciaRepository;

    public function __construct(EmployerTransparenciaRepository $employerTransparenciaRepository) {
        $this->middleware('auth');
        $this->employerTransparenciaRepository = $employerTransparenciaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployerTransparenciaService $employerTransparenciaService, Request $request)
    {
        return $employerTransparenciaService->index($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transparencia = new Transparencia;
        
        $transparencia->nome = $request->nome;
        $transparencia->data = $request->data;
        $transparencia->link = $request->link;
        $transparencia->tipo_id = $request->tipo_id;
        $transparencia->usuario_id = Auth::user()->id;
        $transparencia->municipio_id = Auth::user()->municipio_id;
        $transparencia->orgao_id = Auth::user()->orgao_id;

        $transparencia->save();

        return response($transparencia);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->employerTransparenciaRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        return $this->employerTransparenciaRepository->update($input, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployerTransparenciaService $employerTransparenciaService, $id)
    {
        return $employerTransparenciaService->destroy($id);
    }
}
