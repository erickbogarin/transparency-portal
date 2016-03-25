<?php

namespace portal\Http\Controllers;

use Illuminate\Http\Request;

use portal\Http\Requests;

use portal\Repositories\EmployerTransparenciaRepository;

use portal\Services\EmployerTransparenciaService;

class EmployerTransparenciasController extends Controller
{
    
    private $employerTransparenciaRepository;

    public function __construct(EmployerTransparenciaRepository $employerTransparenciaRepository) {
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
        $input = $request->all();
        return $this->employerTransparenciaRepository->store($input);
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
