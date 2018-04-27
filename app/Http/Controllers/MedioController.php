<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Medio;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;

class MedioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()->of(DB::table('medio'))->toJson();
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
                'medio' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {
                        if($request['id']==null){
                            $medio=$request['medio'];
                            Medio::create([
                            'medio' => $request['medio']
                            ]);
                            $id_registrado = DB::table('medio')->where('medio', $medio)->value('id');
                            return response()->json(['success'=>"Se ha registrado el Medio con éxito...",
                                                      'id'=>$id_registrado]);
                        }else{
                           return $this->update($request,$request['id']);
                        }
                }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'El medio ingresado ya fue registrado']); 
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
        return datatables()->of(DB::table('medio'))->toJson();
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
        $medio = Medio::findOrFail($id);
        $input = [
            'medio' => $request['medio']
        ];
        Medio::where('id', $id)
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
            $medio = Medio::findOrFail($request['id']);
            Medio::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'El Medio "'.$medio['medio'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'El Medio "'.$medio['medio'].'"" se encuentra asignado en alguna Cepa']);
        }

    }

     public function obtenerMedios(){
        return response()->json(['success'=>Medio::all()]);
    }

    public function dataMedio(){
        return datatables()->of(DB::table('medio'))->toJson();
    }
}
