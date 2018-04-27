<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Borde;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use DataTables;
class BordeController extends Controller
{

    

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
                'borde' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {
                        if($request['id']==null){
                        $borde=$request['borde'];
                        Borde::create([
                        'borde' => $request['borde']
                        ]);
                        $id_registrado = DB::table('borde')->where('borde', $borde)->value('id');
                        return response()->json(['success'=>"Se ha registrado el Borde con éxito...",
                                                  'id'=>$id_registrado]);
                    }else{
                       return $this->update($request,$request['id']);
                    }
                }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'El borde ingresado ya fue registrado']); 
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
         return datatables()->of(DB::table('borde'))->toJson();
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
         $borde = Borde::findOrFail($id);
        $input = [
            'borde' => $request['borde']
        ];
        Borde::where('id', $id)
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
            $borde = Borde::findOrFail($request['id']);
            Borde::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'El Borde "'.$borde['borde'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'El Borde "'.$borde['borde'].'"" se encuentra asignado en alguna Cepa']);
        }

    }

    public function obtenerBordes(){
        return response()->json(['success'=>Borde::all()]);
    }

    public function dataBorde(){
        return datatables()->of(DB::table('borde'))->toJson();
    }
}
