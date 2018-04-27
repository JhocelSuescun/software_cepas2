<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\GrupoMicrobiano;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;

class GrupoMicrobianoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()->of(DB::table('grupo_microbiano'))->toJson();
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
                'grupo_microbiano' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {
                        if($request['id']==null){
                        $grupo=$request['grupo_microbiano'];
                        GrupoMicrobiano::create([
                        'grupo_microbiano' => $request['grupo_microbiano']
                        ]);
                        $id_registrado = DB::table('grupo_microbiano')->where('grupo_microbiano', $grupo)->value('id');
                        return response()->json(['success'=>"Se ha registrado el Grupo Microbiano con éxito...",
                                                 'id'=>$id_registrado]);
                    }else{
                       return $this->update($request,$request['id']);
                    }
                }



                                                 


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'El grupo microbiano ingresado ya fue registrado']); 
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
        return datatables()->of(DB::table('grupo_microbiano'))->toJson();
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
        $grupo_microbiano = GrupoMicrobiano::findOrFail($id);
        $input = [
            'grupo_microbiano' => $request['grupo_microbiano']
        ];
        GrupoMicrobiano::where('id', $id)
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
            $gm = GrupoMicrobiano::findOrFail($request['id']);
            GrupoMicrobiano::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'El Grupo Microbiano "'.$gm['grupo_microbiano'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'El Grupo Microbiano "'.$gm['grupo_microbiano'].'"" se encuentra asignado en alguna Cepa']);
        }

    }

    public function obtenerGrupos(){
        return response()->json(['success'=>GrupoMicrobiano::all()]);
    }

    public function dataGrupoMicrobiano(){
        return datatables()->of(DB::table('grupo_microbiano'))->toJson();
    }
}
