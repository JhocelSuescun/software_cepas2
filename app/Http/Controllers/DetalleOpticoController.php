<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DetalleOptico;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
class DetalleOpticoController extends Controller
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
            if($request->ajax()){
                 $validator = Validator::make($request->all(), [
                'detalle_optico' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {
                        if($request['id']==null){
                            $detalleoptico=$request['detalle_optico'];
                            DetalleOptico::create([
                            'detalle_optico' => $request['detalle_optico']
                            ]);
                            $id_registrado = DB::table('detalleoptico')->where('detalle_optico', $detalleoptico)->value('id');
                            return response()->json(['success'=>"Se ha registrado el Detalle Óptico con éxito...",
                                                      'id'=>$id_registrado]);
                        }else{
                           return $this->update($request,$request['id']);
                        }
                }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'El detalle óptico ingresado ya fue registrado']); 
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
         return datatables()->of(DB::table('detalleoptico'))->toJson();
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
        $detalleoptico = DetalleOptico::findOrFail($id);
        $input = [
            'detalle_optico' => $request['detalle_optico']
        ];
        DetalleOptico::where('id', $id)
            ->update($input);    
        return response()->json(['success'=>'Se ha actualizado la información correctamente...']);
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

     public function eliminar(Request $request)
    {
        try{
            $detop = DetalleOptico::findOrFail($request['id']);
            DetalleOptico::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'El Detalle Óptico "'.$detop['detalle_optico'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'El Detalle Óptico "'.$detop['detalle_optico'].'"" se encuentra asignado en alguna Cepa']);
        }

    }

     public function obtenerDetalles(){
        return response()->json(['success'=>DetalleOptico::all()]);
    }

    public function dataDetalleOptico(){
        return datatables()->of(DB::table('detalle_optico'))->toJson();
    }
}

