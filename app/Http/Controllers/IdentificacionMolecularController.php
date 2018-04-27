<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\IdentificacionMolecular;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;


class IdentificacionMolecularController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $input = [
                'informe_secuenciacion' => $request['informe_secuenciacion'],
                'fechaaccesion' => $request['fecha_accesion'],
                'rep_solu_salina' => $request['repeticiones_solucion_salina'],
                'obs_solu_salina' => $request['observaciones_solucion_salina'],
                'rep_tub_agar' => $request['repeticiones_tubos_agar'],
                'obs_tub_agar' => $request['observaciones_tubos_agar'],
                'rep_suelo_esteril' => $request['repeticiones_viales_suelo'],
                'obs_suelo_esteril' => $request['observaciones_viales_suelo'],
                'rep_cult_agar' => $request['repeticiones_caja_agar'],
                'obs_cult_agar' => $request['observaciones_caja_agar'],
                'rep_glicerol' => $request['repeticiones_glicerol'],
                'obs_glicerol' => $request['observaciones_glicerol'],
                'rep_papel_filtro' => $request['repeticiones_papel_filtro'],
                'obs_papel_filtro' => $request['observaciones_papel_filtro'],
                'porcentaje_similitud' => $request['porcentaje_similitud']
            ];
            IdentificacionMolecular::where('id',  $request['id'])
                ->update($input);
            $cepa_codigo = DB::table('cepa')->where('id', $request['id_cepa'])->value('codigo');//evaluo si ya esta creada la identificacion molecular
            return response()->json(['success'=>"Se ha actualizado la identificación molecular de la cepa ".$cepa_codigo." con éxito..."]);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inexperado']); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_im = DB::table('identificacion_molecular')->where('id_cepa', $id)->value('id');//evaluo si ya esta creada la identificacion molecular
        if($id_im==null){
            IdentificacionMolecular::create([
                        'id_cepa' => $id

                        ]);
            
        }
        $id_im = DB::table('identificacion_molecular')->where('id_cepa', $id)->value('id');
        $codigo_cepa = DB::table('cepa')->where('id', $id)->value('codigo');
        $im = IdentificacionMolecular::find($id_im);
        return view('admin/cepa/IdentificacionMolecular/formIdentificacionMolecular',['im'=>$im, 'codigo_cepa'=>$codigo_cepa]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
