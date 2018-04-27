<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Origen;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;

class OrigenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()->of(DB::table('origen'))->toJson();
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
                'origen' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {
                        if($request['id']==null){
                             $origen=$request['origen'];
                            Origen::create([
                            'origen' => $request['origen']
                            ]);
                            $id_registrado = DB::table('origen')->where('origen', $origen)->value('id');
                            
                            return response()->json(['success'=>"Se ha registrado el Origen con éxito...",
                                                  'id'=>$id_registrado]);
                    }else{
                       return $this->update($request,$request['id']);
                    }
                }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'El origen ingresado ya fue registrado']); 
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
        return datatables()->of(DB::table('origen'))->toJson();
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
        $origen = Origen::findOrFail($id);
        $input = [
            'origen' => $request['origen']
        ];
        Origen::where('id', $id)
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
            $origen = Origen::findOrFail($request['id']);
            Origen::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'El Origen "'.$origen['origen'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'El Origen "'.$origen['origen'].'"" se encuentra asignado en alguna Cepa']);
        }

    }

    public function obtenerOrigenes(){
        return response()->json(['success'=>Origen::all()]);
    }

    public function dataOrigen(){
        return datatables()->of(DB::table('origen'))->toJson();
    }
}
