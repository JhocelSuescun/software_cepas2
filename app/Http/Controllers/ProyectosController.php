<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cepa;
use App\Proyectos;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;

class ProyectosController extends Controller
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
        return view('admin/proyecto/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/proyecto/crearProyecto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        
            Proyectos::create([
                        'nombre_proyecto' => $request['nombre_proyecto'],
                        'estado' => $request['estado'],
                        'cepas_asociadas' => $request['cepas_asociadas'],
                        'lugar_aislamiento' => $request['lugar_aislamiento'],
                        'fecha_aislamiento' => $request['fecha_aislamiento'],
                        'nombre_aislador' => $request['nombre_aislador'],
                        'publicado' => $request['publicado']

                        ]);
            return response()->json(['success'=>"Se ha registrado el Proyecto con éxito..."]);
        

        /*$parts = explode("-", $request["cepas_asociadas"]);
         foreach($parts as $part) {
            echo "<li>";
            echo trim($part). ".";
            echo "</li>";
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return datatables()->of(DB::table('proyectos'))->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto=Proyectos::find($id);
        $cepas_asociadas = explode(",", $proyecto["cepas_asociadas"]);
        $cepas=Cepa::all();
        
        return view("admin/proyecto/editarProyecto",['proyecto'=>$proyecto, 'cepas'=>$cepas, 'cepas_asociadas'=>$cepas_asociadas]);
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
        //
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
            $proyecto = Proyectos::findOrFail($request['id']);
            Proyectos::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'El proyecto "'.$proyecto['nombre_proyecto'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inesperado']);
        }

    }

     public function actualizar(Request $request)
    {
        try{
            $input = [
                        'nombre_proyecto' => $request['nombre_proyecto'],
                        'estado' => $request['estado'],
                        'cepas_asociadas' => $request['cepas_asociadas'],
                        'lugar_aislamiento' => $request['lugar_aislamiento'],
                        'fecha_aislamiento' => $request['fecha_aislamiento'],
                        'nombre_aislador' => $request['nombre_aislador'],
                        'publicado' => $request['publicado']
            ];
            Proyectos::where('id',  $request['id'])
                ->update($input);
            return response()->json(['success'=>"Se ha actualizado la información del proyecto"]);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inexperado']); 
        }
    }

    public function obtenerCepas(){
        return response()->json(['success'=>Cepa::all()]);
    }

     public function showInoculacion($id)
    {
        $nombre_proyecto = DB::table('proyectos')->where('id', $id)->value('nombre_proyecto');
        return view('admin/proyecto/inoculacion_plantas/index', ['nombre_proyecto'=>$nombre_proyecto, 'id_proyecto'=>$id]);
    }

     public function publicar(Request $request)
    {
        try{
            $input = [
                
                'publicado' => $request['publicado']
            ];
            Proyectos::where('id',  $request['id'])
                ->update($input);
            
            return response()->json(['success'=> 'Se realizó el cambio correctamente']);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inesperado...']);
        }

    }

    public function dataProyecto(){
        return datatables()->of(DB::table('proyectos'))->toJson();
    }
}
