<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cepa;
use App\CepaXMedio;
use App\CaracterizacionFisiologica;
use App\IdentificacionMolecular;
use App\Genero;
use App\Especie; 
use App\GrupoMicrobiano;
use App\Origen;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use App\ProjectImage;
class CepaController extends Controller
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
        $cep = DB::table('cepa')
        ->leftJoin('especie', 'cepa.id_especie', '=', 'especie.id')
        ->leftJoin('grupo_microbiano', 'cepa.id_grupomicrobiano', '=', 'grupo_microbiano.id')
        ->leftJoin('genero', 'cepa.id_genero', '=', 'genero.id')
        ->leftJoin('origen', 'cepa.id_origen', '=', 'origen.id')
        ->select('cepa.*','especie.especie as especie', 'grupo_microbiano.grupo_microbiano as grupomicrobiano', 
            'genero.genero as genero', 'origen.origen as origen' )
        ->get();

        $imagenes = ProjectImage::all();
        
        return view('admin/cepa/index', ['cepa'=>$cep, 'imagenes'=>$imagenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/cepa/crearCepa');
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
            
            Cepa::create([
                        'codigo' => $request['codigo'],
                        'estado' => $request['estado'],
                        'id_genero' => $request['genero'],
                        'id_especie' => $request['especie'],
                        'id_grupomicrobiano' => $request['grupo_microbiano'],
                        'id_origen' => $request['origen'],
                        'morfologia' => $request['morfologia'],
                        'tincion_gram' => $request['tincion_gram'],
                        'motilidad' => $request['motilidad'],
                        'publicado' => $request['publicado']

                        ]);
            return response()->json(['success'=>"Se ha registrado la Cepa con éxito..."]);
        }catch(Exception $ex){
            return response()->json(['error'=>'El codigo de la cepa ingresada ya fue registrada']); 
        }
         return redirect()->intended('cepa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return datatables()->of(DB::table('cepa')
                                ->leftJoin('genero', 'cepa.id_genero', '=', 'genero.id')
                                ->leftJoin('especie', 'cepa.id_especie', '=', 'especie.id')
                                ->leftJoin('grupo_microbiano', 'cepa.id_grupomicrobiano', '=', 'grupo_microbiano.id')
                                ->leftJoin('origen', 'cepa.id_origen', '=', 'origen.id')
                                ->select('cepa.*', 'genero.genero', 'especie.especie','grupo_microbiano.grupo_microbiano','origen')
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
         $cepa = Cepa::find($id);
         $genero = Genero::All();
         $especie = DB::table('especie')
                            ->select('especie.*')
                            ->where('id_genero','=',$cepa->id_genero)
                            ->get();
         $gm = GrupoMicrobiano::All();
         $origen = Origen::All();
         
         return view('admin/cepa/editarCepa',['cepa'=>$cepa, 'genero'=>$genero, 'especie'=>$especie,
                                                'grupomicrobiano'=>$gm, 'origen'=>$origen]);
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
            $cepa = Cepa::findOrFail($request['id']);
            CepaXMedio::where('id_cepa', $request['id'])->delete();
            CaracterizacionFisiologica::where('id_cepa', $request['id'])->delete();
            IdentificacionMolecular::where('id_cepa', $request['id'])->delete();
            Cepa::where('id', $request['id'])->delete();
            
            return response()->json(['success'=> 'La Cepa "'.$cepa['codigo'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'La cepa "'.$cepa['codigo'].'"" se encuentra asignado en algo']);
        }

    }

    public function actualizar(Request $request)
    {
        try{
            $input = [
                'codigo' => $request['codigo'],
                'estado' => $request['estado'],
                'id_genero' => $request['genero'],
                'id_especie' => $request['especie'],
                'id_grupomicrobiano' => $request['grupo_microbiano'],
                'id_origen' => $request['origen'],
                'morfologia' => $request['morfologia'],
                'tincion_gram' => $request['tincion_gram'],
                'motilidad' => $request['motilidad'],
                'publicado' => $request['publicado']
            ];
            Cepa::where('id',  $request['id'])
                ->update($input);
            return response()->json(['success'=>"Se ha actualizado la identificación molecular de la cepa ".$request['codigo']." con éxito..."]);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inexperado']); 
        }
    }

     public function publicar(Request $request)
    {
        try{
            $input = [
                
                'publicado' => $request['publicado']
            ];
            Cepa::where('id',  $request['id'])
                ->update($input);
            
            return response()->json(['success'=> 'Se realizó el cambio correctamente']);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inesperado...']);
        }

    }

    public function dataCepa(){
        return datatables()->of(DB::table('cepa'))->toJson();
    }
}
