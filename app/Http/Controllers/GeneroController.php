<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Genero;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;

class GeneroController extends Controller
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
                'genero' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {
                    if($request['id']==null){
                         $genero=$request['genero'];
                        Genero::create([
                        'genero' => $request['genero']
                        ]);
                        $id_registrado = DB::table('genero')->where('genero', $genero)->value('id');
                    return response()->json(['success'=>"Se ha registrado el Género con éxito...",
                                            'id'=>$id_registrado]);
                    }else{
                       return $this->update($request,$request['id']);
                    }
                    
                }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'El género ingresado ya fue registrado']); 
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
        return datatables()->of(DB::table('genero'))->toJson();
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
        $genero = Genero::findOrFail($id);
        $input = [
            'genero' => $request['genero']
        ];
        Genero::where('id', $id)
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
            $genero = Genero::findOrFail($request['id']);
           Genero::where('id', $request['id'])->delete();
        return response()->json(['success'=> 'El Género "'.$genero['genero'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'El Género "'.$genero['genero'].'"" se encuentra asignado a una Especie o Cepa']);
        }

    }

    public function obtenerGeneros(){
        return response()->json(['success'=>Genero::all()]);
    }

    public function dataGenero(){
        return datatables()->of(DB::table('genero'))->toJson();
    }
}
