<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Elevacion;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
class ElevacionController extends Controller
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
                'elevacion' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {
                        if($request['id']==null){
                            $elevacion=$request['elevacion'];
                            Elevacion::create([
                            'elevacion' => $request['elevacion']
                            ]);
                            $id_registrado = DB::table('elevacion')->where('elevacion', $elevacion)->value('id');
                            return response()->json(['success'=>"Se ha registrado la Elevación con éxito...",
                                                      'id'=>$id_registrado]);
                        }else{
                           return $this->update($request,$request['id']);
                        }
                }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'La elevación ingresada ya fue registrada']); 
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
         return datatables()->of(DB::table('elevacion'))->toJson();
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
        $elevacion = Elevacion::findOrFail($id);
        $input = [
            'elevacion' => $request['elevacion']
        ];
        Elevacion::where('id', $id)
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
            $elevacion = Elevacion::findOrFail($request['id']);
            Elevacion::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'La elevación "'.$elevacion['elevacion'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'La elevación "'.$elevacion['elevacion'].'"" se encuentra asignado en alguna Cepa']);
        }

    }

     public function obtenerElevaciones(){
        return response()->json(['success'=>Elevacion::all()]);
    }

    public function dataElevacion(){
        return datatables()->of(DB::table('elevacion'))->toJson();
    }
}
