<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Especie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;

class EspecieController extends Controller
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
                'especie' => 'required|max:20',
                'id_genero' => 'required'
                ]);
                  

                if ($validator->passes()) {
                    if($request['id']==null){
                        $especie=$request['especie'];
                        Especie::create([
                        'especie' => $request['especie'],
                        'id_genero' => $request['id_genero']
                        ]);
                        $id_registrado = DB::table('especie')->where('especie', $especie)->value('id');
                    return response()->json(['success'=>"Se ha registrado la Especie con éxito...",
                                             'id'=>$id_registrado]);
                    }else{
                       return $this->update($request,$request['id']);
                    }
                }               


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'La especie ingresada ya fue registrada']); 
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
        return datatables()->of(DB::table('especie')
                                ->leftJoin('genero', 'especie.id_genero', '=', 'genero.id')
                                ->select('especie.*', 'genero.genero')
                                ->get()
                                )->toJson();
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
        $super = Especie::findOrFail($id);
        $input = [
            'especie' => $request['especie'],
            'id_genero' => $request['id_genero']
        ];
        Especie::where('id', $id)
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
            $especie = Especie::findOrFail($request['id']);
            Especie::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'La Especie "'.$especie['especie'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'La Especie "'.$especie['especie'].'"" se encuentra asignado a alguna Cepa']);
        }

    }

    public function obtenerEspecies(Request $request){
        return response()->json(['success'=>DB::table('especie')
                                ->select('especie.*')
                                ->where('id_genero','=',$request['genero'])
                                ->get()]); 
    }

    public function dataEspecie(){
        return datatables()->of(DB::table('especie'))->toJson();
    }
}
