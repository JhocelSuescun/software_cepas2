<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\CaracterizacionFisiologica;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;

class CaracterizacionFisiologicaController extends Controller
{
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
           $id_cepa=$request['id_cepa'];

            CaracterizacionFisiologica::create([
                            'id_cepa'=>$request['id_cepa'],
                            'fecha' => $request['fecha'],
                            'acido_indolacetico' => $request['acido_indolacetico'],
                            'solubilizacion_fosfatos' => $request['solubilizacion_fosfatos'],
                            'produccion_sideroforos' => $request['produccion_sideroforos'],
                            'fijacion_nitrogeno' => $request['fijacion_nitrogeno'],
                            'acido_salicilico' => $request['acido_salicilico'],
                            'actividad_enzimatica' => $request['actividad_enzimatica']
                            ]);

        return response()->json(['success'=>"Se ha registrado la caracterización fisiológica con éxito...", 
                                'id_cepa'=>$id_cepa]);
        }catch(Exception $ex){
            return response()->json(['error'=>'Se ha generado un error en el registro']); 
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
        $codigo_cepa = DB::table('cepa')->where('id', $id)->value('codigo');
        return view('admin/cepa/caracterizacionfisiologica/index', ['codigo_cepa' => $codigo_cepa, 'id_cepa'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cepa, $id)
    {
        $cf = CaracterizacionFisiologica::find($id);

         return view('admin/cepa/caracterizacionfisiologica/editarCaracterizacionFisiologica',['caracterizacionfisiologica'=>$cf]);
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

    public function listarCaracterizaciones(Request $request)
    {
        return datatables()->of(DB::table('caracterizacion_fisiologica')
                                ->where('id_cepa','=',$request['id'])
                                ->get()
                                )->toJson();
    }

    public function crear($id)
    {
        return view('admin/cepa/caracterizacionfisiologica/crearCaracterizacionFisiologica',['id_cepa'=>$id]);
    }

    public function actualizar(Request $request)
    {
        try{
            $input = [
                'fecha' => $request['fecha'],
                'acido_indolacetico' => $request['acido_indolacetico'],
                'solubilizacion_fosfatos' => $request['solubilizacion_fosfatos'],
                'produccion_sideroforos' => $request['produccion_sideroforos'],
                'fijacion_nitrogeno' => $request['fijacion_nitrogeno'],
                'acido_salicilico' => $request['acido_salicilico'],
                'actividad_enzimatica' => $request['actividad_enzimatica']
            ];
            CaracterizacionFisiologica::where('id',  $request['id'])
                ->update($input);
                $codigo_cepa = DB::table('cepa')->where('id', $request['id_cepa'])->value('codigo');
            return response()->json(['success'=>"Se ha actualizado la caracterización fisiológica de la cepa ".$codigo_cepa." con éxito...",
                                    'id_cepa'=>$request['id_cepa']]);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inexperado']); 
        }
    }


    public function eliminar(Request $request)
    {
        try{
            $cf = CaracterizacionFisiologica::findOrFail($request['id']);
            CaracterizacionFisiologica::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'La Caracterización Fisiológica seleccionada se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inexperado']);
        }

    }
}
