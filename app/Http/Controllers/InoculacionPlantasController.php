<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\InoculacionPlantas;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;

class InoculacionPlantasController extends Controller
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
        
           $id_proyecto=$request['id_proyecto'];
            InoculacionPlantas::create([
                            'id_proyecto'=>$request['id_proyecto'],
                            'fecha' => $request['fecha'],
                            'cultivo' => $request['cultivo'],
                            'variables' => $request['variables'],
                            'rendimiento' => $request['rendimiento'],
                            'peso_fresco_foliar' => $request['peso_fresco_foliar'],
                            'peso_seco_foliar' => $request['peso_seco_foliar'],
                            'peso_fresco_radical' => $request['peso_fresco_radical'],
                            'peso_seco_radical' => $request['peso_seco_radical'],
                            'altura_planta' => $request['altura_planta'],
                            'longitud_planta' => $request['longitud_planta']
                            ]);

        return response()->json(['success'=>"Se ha registrado la inoculación con éxito...", 
                                'id_proyecto'=>$id_proyecto]);
        
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
    public function edit($id_proyecto, $id)
    {
        $ip=InoculacionPlantas::find($id);
        return view('admin/proyecto/inoculacion_plantas/editarInoculacionPlantas',['inoculacion'=>$ip]);
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

    public function listarInoculaciones(Request $request)
    {
        return datatables()->of(DB::table('inoculacion_plantas')
                                ->select('inoculacion_plantas.*')
                                ->where('id_proyecto','=',$request['id'])
                                ->get()
                                )->toJson();
    }

    public function crear($id)
    {
        return view('admin/proyecto/inoculacion_plantas/crearInoculacionPlantas',['id_proyecto'=>$id]);
    }

    public function actualizar(Request $request)
    {
        try{
            $input = [
                'fecha' => $request['fecha'],
                'cultivo' => $request['cultivo'],
                'variables' => $request['variables'],
                'rendimiento' => $request['rendimiento'],
                'peso_fresco_foliar' => $request['peso_fresco_foliar'],
                'peso_seco_foliar' => $request['peso_seco_foliar'],
                'peso_fresco_radical' => $request['peso_fresco_radical'],
                'peso_seco_radical' => $request['peso_seco_radical'],
                'altura_planta' => $request['altura_planta'],
                'longitud_planta' => $request['longitud_planta']
            ];
            InoculacionPlantas::where('id',  $request['id'])
                ->update($input);
                return response()->json(['success'=>"Se ha actualizado la inoculación con éxito...",
                                    'id_proyecto'=>$request['id_proyecto']]);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inexperado']); 
        }
    }

    public function eliminar(Request $request)
    {
        try{
            $ip = InoculacionPlantas::findOrFail($request['id']);
            InoculacionPlantas::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'Se eliminó correctamente la inoculación seleccionada']);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inexperado']);
        }

    }
}
