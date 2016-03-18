<?php

namespace portal\Http\Controllers;

use Illuminate\Http\Request;

use portal\Http\Requests;

use DB;

class TransparenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $municipio = $request->get('municipio');
        $orgao = $request->get('orgao');

        $transparencias = DB::table('transparencia')
            ->select('transparencia.nome', 'transparencia.data', 'transparencia.link')
            ->join('municipio', 'transparencia.municipio_id', '=', 'municipio.id')
            ->join('orgao', 'transparencia.orgao_id', '=', 'orgao.id')
            ->where([
                ['municipio.nome',$municipio],
                ['orgao.nome',$orgao],
            ])->paginate(5);      
        
        return response($transparencias);
    }

}
