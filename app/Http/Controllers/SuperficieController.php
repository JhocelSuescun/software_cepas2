<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Superficie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
class SuperficieController extends Controller
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
                'superficie' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {
                    if($request['id']==null){
                        $superficie=$request['superficie'];
                        Superficie::create([
                        'superficie' => $request['superficie']
                        ]);
                        $id_registrado = DB::table('superficie')->where('superficie', $superficie)->value('id');
                        return response()->json(['success'=>"Se ha registrado la Superficie con éxito...",
                                                  'id'=>$id_registrado]);
                    }else{
                       return $this->update($request,$request['id']);
                    }
                }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'La superficie ingresada ya fue registrada']); 
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
        return datatables()->of(DB::table('superficie'))->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
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
        $super = Superficie::findOrFail($id);
        $input = [
            'superficie' => $request['superficie']
        ];
        Superficie::where('id', $id)
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
            $superficie = Superficie::findOrFail($request['id']);
            Superficie::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'La Superficie "'.$superficie['superficie'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'La Superficie "'.$superficie['superficie'].'"" se encuentra asignado en alguna Cepa']);
        }

    }

    private function validateInput($request) {
        $this->validate($request, [
        'superficie' => 'required|max:5|unique:superficie'
    ]);
    }

     public function obtenerSuperficies(){
        return response()->json(['success'=>Superficie::all()]);
    }

    public function dataSuperficie(){
        return datatables()->of(DB::table('superficie'))->toJson();
    }
}
