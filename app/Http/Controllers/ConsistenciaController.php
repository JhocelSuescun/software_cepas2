<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Consistencia;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
class ConsistenciaController extends Controller
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
                'consistencia' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {
                    if($request['id']==null){
                        $consistencia=$request['consistencia'];
                        Consistencia::create([
                        'consistencia' => $request['consistencia']
                        ]);
                        $id_registrado = DB::table('consistencia')->where('consistencia', $consistencia)->value('id');
                    return response()->json(['success'=>"Se ha registrado la consistencia con éxito...",
                                                  'id'=>$id_registrado]);
                    }else{
                       return $this->update($request,$request['id']);
                    }
                }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'La consistencia ingresada ya fue registrada']); 
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
         return datatables()->of(DB::table('consistencia'))->toJson();
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
        $consistencia = Consistencia::findOrFail($id);
        $input = [
            'consistencia' => $request['consistencia']
        ];
        Consistencia::where('id', $id)
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
            $consistencia = Consistencia::findOrFail($request['id']);
            Consistencia::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'La Consistencia "'.$consistencia['consistencia'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'La Consistencia "'.$consistencia['consistencia'].'"" se encuentra asignada en alguna Cepa']);
        }
    }

     public function obtenerConsistencias(){
        return response()->json(['success'=>Consistencia::all()]);
    }
    public function dataConsistencia(){
        return datatables()->of(DB::table('consistencia'))->toJson();
    }
}
