<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\CepaXMedio;
use App\Medio;
use App\Borde;
use App\Consistencia;
use App\DetalleOptico;
use App\Elevacion;
use App\Forma;
use App\Superficie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
class CepaXMedioController extends Controller
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
        return view('admin/cepa/cepaxmedio/index');
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
           $id_cepa=$request['id_cepa'];
            CepaXMedio::create([
                            'id_cepa'=>$request['id_cepa'],
                            'id_borde' => $request['borde'],
                            'id_medio' => $request['medio'],
                            'id_consistencia' => $request['consistencia'],
                            'id_detalleoptico' => $request['detalle_optico'],
                            'id_elevacion' => $request['elevacion'],
                            'id_forma' => $request['forma'],
                            'id_superficie' => $request['superficie'],
                            'color' => $request['color'],
                            'otrasCaracteristicas' => $request['otras_caracteristicas']
                            ]);

        return response()->json(['success'=>"Se ha registrado el Medio Selectivo con éxito...", 
                                'id_cepa'=>$id_cepa]);
        }catch(Exception $ex){
            return response()->json(['error'=>'El medio selectivo ya fue registrado']); 
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
        $codigo_cepa = DB::table('cepa')->where('id', $id)->value('codigo');
        return view('admin/cepa/cepaxmedio/index', ['codigo_cepa' => $codigo_cepa, 'id_cepa'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cepa, $id)
    {
        $cxm = CepaXMedio::find($id);
        $codigo_cepa = DB::table('cepa')->where('id', $id_cepa)->value('codigo');
         $medio = Medio::All();
         $borde = Borde::All();
         $consistencia = Consistencia::All();
         $detalleoptico = DetalleOptico::All();
         $elevacion = Elevacion::All();
         $forma = Forma::All();
         $superficie = Superficie::All();
        return view('admin/cepa/cepaxmedio/editarCepaXMedio',['cxm'=>$cxm, 'codigo_cepa'=>$codigo_cepa, 'medio'=>$medio, 'borde'=>$borde,
                                                            'consistencia'=>$consistencia, 'detalleoptico'=>$detalleoptico,
                                                            'elevacion'=>$elevacion, 'forma'=>$forma, 'superficie'=>$superficie]);
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

     public function mediosSelectivos($id)
    {
       echo "metodo medios selectivos en cepaxmedio controller";
    }

    public function crear($id)
    {
        $codigo_cepa = DB::table('cepa')->where('id', $id)->value('codigo');
        return view('admin/cepa/cepaxmedio/crearCepaXMedio',['id_cepa'=>$id, 'codigo_cepa'=>$codigo_cepa]);
    }

    public function listarCepaXMedio(Request $request)
    {
        return datatables()->of(DB::table('cepaxmedio')
                                ->leftJoin('medio', 'cepaxmedio.id_medio', '=', 'medio.id')
                                ->leftJoin('borde', 'cepaxmedio.id_borde', '=', 'borde.id')
                                ->leftJoin('consistencia', 'cepaxmedio.id_consistencia', '=', 'consistencia.id')
                                ->leftJoin('detalleoptico', 'cepaxmedio.id_detalleoptico', '=', 'detalleoptico.id')
                                ->leftJoin('elevacion', 'cepaxmedio.id_elevacion', '=', 'elevacion.id')
                                ->leftJoin('forma', 'cepaxmedio.id_forma', '=', 'forma.id')
                                ->leftJoin('superficie', 'cepaxmedio.id_superficie', '=', 'superficie.id')
                                ->select('cepaxmedio.*', 'medio.medio', 'borde.borde', 'consistencia.consistencia',
                                    'detalleoptico.detalle_optico','elevacion.elevacion','forma.forma','superficie.superficie')
                                ->where('id_cepa','=',$request['id'])
                                ->get()
                                )->toJson();
    }

    public function actualizar(Request $request)
    {
        try{
            $input = [
                'id_borde' => $request['borde'],
                'id_medio' => $request['medio'],
                'id_consistencia' => $request['consistencia'],
                'id_detalleoptico' => $request['detalle_optico'],
                'id_elevacion' => $request['elevacion'],
                'id_forma' => $request['forma'],
                'id_superficie' => $request['superficie'],
                'color' => $request['color'],
                'otrasCaracteristicas' => $request['otras_caracteristicas']
            ];
            CepaXMedio::where('id',  $request['id'])
                ->update($input);
                $codigo_cepa = DB::table('cepa')->where('id', $request['id_cepa'])->value('codigo');
            return response()->json(['success'=>"Se ha actualizado el medio selectivo de la cepa ".$codigo_cepa." con éxito...",
                                    'id_cepa'=>$request['id_cepa']]);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inexperado']); 
        }
    }

     public function eliminar(Request $request)
    {
        try{
            $cxm = CepaXMedio::findOrFail($request['id']);
            CepaXMedio::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'El medio selectivo "'.$cxm['medio'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inexperado']);
        }

    }
}
