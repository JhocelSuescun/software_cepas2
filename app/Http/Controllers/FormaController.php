<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Forma;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
class FormaController extends Controller
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
                'forma' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {
                    if($request['id']==null){
                        $forma=$request['forma'];
                        Forma::create([
                        'forma' => $request['forma']
                        ]);
                        $id_registrado = DB::table('forma')->where('forma', $forma)->value('id');
                        return response()->json(['success'=>"Se ha registrado la Forma con éxito...",
                                                  'id'=>$id_registrado]);
                    }else{
                       return $this->update($request,$request['id']);
                    }
            }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'La forma ingresada ya fue registrada']); 
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
         return datatables()->of(DB::table('forma'))->toJson();
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
        $forma = Forma::findOrFail($id);
        $input = [
            'forma' => $request['forma']
        ];
        Forma::where('id', $id)
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
            $forma = Forma::findOrFail($request['id']);
           Forma::where('id', $request['id'])->delete();
           return response()->json(['success'=> 'La Forma "'.$forma['forma'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'La Forma "'.$forma['forma'].'"" se encuentra asignado a alguna Cepa']);
        }

    }

     public function obtenerFormas(){
        return response()->json(['success'=>Forma::all()]);
    }

    public function dataForma(){
        return datatables()->of(DB::table('forma'))->toJson();
    }
}
