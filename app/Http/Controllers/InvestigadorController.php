<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Investigador;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use Response;
use Intervention\Image\Exception\NotReadableException;
class InvestigadorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inv= DB::table('investigador')
              ->paginate(8);
        return view('admin/investigador/indexInvestigador', ['investigador' => $inv]);
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
                'nombres' => 'required|max:20'
                ]);
                  

                if ($validator->passes()) {


                        if($request['id_investigador']==null){


                            if ($request->file('imagen')) {
                                $path = $request->file('imagen')->store('investigador');
                                $request['imagen'] = $path;
                            }else{
                                $path="";
                            }

                            Investigador::create([
                                'nombres' => $request['nombres'],
                                'apellidos' => $request['apellidos'],
                                'codigo' => $request['codigo'],
                                'email' => $request['email'],
                                'url_cvlac' => $request['url_cvlac'],
                                'imagen' => $path,
                            ]);
                            return response()->json(['success'=>"Se ha registrado el investigador con éxito..."]);
                        }else{
                           return $this->update($request,$request['id_investigador']);
                        }
                }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'El codigo del investigador ya fue registrado']); 
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
         return datatables()->of(DB::table('investigador'))->toJson();
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
           
         $investigador = Investigador::findOrFail($id);
         if ($request->file('imagen')) {
            $path = $request->file('imagen')->store('investigador');
            $request['imagen'] = $path;
             $input = [
            'imagen' => $path,
            ];
             Investigador::where('id', $id)
            ->update($input);
            
        }  
        $input = [
            'nombres' => $request['nombres'],
            'apellidos' => $request['apellidos'],
            'codigo' => $request['codigo'],
            'email' => $request['email'],
            'url_cvlac' => $request['url_cvlac']
        ];
        Investigador::where('id', $id)
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
            $investigador = Investigador::findOrFail($request['id']);
            Investigador::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'El Investigador "'.$investigador['nombres']." ". $investigador['apellidos'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'El Investigador "'.$investigador['nombres']." ". $investigador['apellidos'].'"" se encuentra asignado en alguna Cepa']);
        }

    }

    public function load($name) {
         $path = storage_path().'/app/investigador/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    public function validar_imagen(Request $request){
        
       $img = Image::make($request->file('imagen'));
       if($img->height()!=$img->width()){
            return response()->json(['error'=>'Las dimensiones de la imagen deben ser iguales']);
       }
       return response()->json(['success'=>'Las dimensiones de la imagen son iguales']);
    }

    public function dataInvestigador(){
        return datatables()->of(DB::table('investigador'))->toJson();
    }
}
