<?php

namespace portal\Http\Controllers;

use Illuminate\Http\Request;

use portal\Http\Requests;

use portal\Transparencia;

use DB;

class UserTransparenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->get('user');
        $municipio = $request->get('municipio');
    
        if($request->get('date')) {
            $transparencias = Transparencia::
            where([
                ['usuario_id',$user],
                ['municipio_id',$municipio],
                [DB::raw('DATE_FORMAT(transparencia.data, "%m/%Y")'), 'LIKE', "%{$request->get('date')}"],
                ])
                ->join('tipo_transparencia', 'transparencia.tipo_id', '=', 'tipo_transparencia.id')
                ->with('tipoTransparencia')
                ->orderBy('data', 'DESC')->paginate(10);      
        } else {
            $transparencias = Transparencia::
            select('transparencia.*', 'tipo_transparencia.nome as tipo_nome')
            ->leftJoin('tipo_transparencia', 'tipo_transparencia.id', '=', 'transparencia.tipo_id')
            ->where([
                ['usuario_id',$user],
                ['municipio_id',$municipio],
                ])
                ->orderBy('data', 'DESC')->paginate(10);
        }

        return response($transparencias);
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
        $create = Transparencia::create($input);
        return response($create);
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
        $transparencia = Transparencia::find($id);
        return response($transparencia);
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
        
        Transparencia::where("id",$id)->update($input);
        $transparencia = Transparencia::find($id);
        return response($transparencia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Transparencia::where('id',$id)->delete();
    }
}
