<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\MetodosConservacion;
use App\MetodoConservacionSolucionSalina;
use App\MetodoConservacionGlicerol;
use App\MetodoConservacionSuelo;
use App\MetodoConservacionAgarSemisolido;
use App\MetodoConservacionAgarSolidoCaja;
use App\MetodoConservacionAgarSolidoTubo;
use App\MetodoConservacionCaldo;
use App\TipoMetodo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use App\ProjectImage;
use Toastr;

class MetodosConservacionController extends Controller
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
        if( $request['id']==null){//si el id que se envia es nulo es porque quiere añadir uno nuevo
                $tipo_metodo = DB::table('tipo_metodos')->where('id', $request['metodo_conservacion'])->value('tipo');
                $id_metodo=$request['metodo_conservacion'];//1: solucion salina,2: glicerol: 3: suelo, 4: agar semisolido, 5: agar solido caja, 6: agar solido tubo, 7: caldo
                 $input = [
                        'title' => $tipo_metodo,
                        'start' => $request['start'],
                        'id_cepa' => $request['id_cepa'],
                        'id_tipo' => $request['metodo_conservacion'],
                        'numero_replicas' => $request['numero_replicas'],
                        'recuento' => $request['recuento']
                    ];
                    /*CaracteristicasMicroscopicas::where('id',  $request['id'])
                        ->update($input);*/
                        $metodo= MetodosConservacion::create($input);//guardo y obtengo el registro guardado
                        $this->agregarRespectivoMetodoConservacion($metodo['id'], $metodo['id_tipo'],$request['microgota']);//asigna el evento del metodo de conservacion a la respectiva entidad de conservacion
        }else{//si no es nulo es porque va a actualizar la informacion
            $this->update($request,$request['id']);//actualizo en el metodo
            $metodo=MetodosConservacion::find($request['id']);//busco el metodo para enviar informacion en la notificacion
        }              
                //$cepa_codigo = DB::table('cepa')->where('id', $request['id_cepa'])->value('codigo');
           Toastr::success('Registro exitoso...', 'Evento: creado'.$metodo['id'], ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('metodos_conservacion.mostrar', ['id' => $metodo['id_cepa']]);
            
    }


    public function agregarRespectivoMetodoConservacion($id_metodo, $id_tipometodo,$microgota){
        $input = [
                'id_metodo' => $id_metodo
                ];
        switch ($id_tipometodo) {
                    case 1:
                        $input['microgota'] = $microgota;
                        MetodoConservacionSolucionSalina::create($input);
                        break;
                    case 2:
                        $input['microgota'] = $microgota;
                        MetodoConservacionGlicerol::create($input);
                        break;
                    case 3:
                        $input['microgota'] = $microgota;
                        MetodoConservacionSuelo::create($input);
                        break;
                    case 4:
                        MetodoConservacionAgarSemisolido::create($input);
                        break;
                    case 5:
                        MetodoConservacionAgarSolidoCaja::create($input);
                        break;
                    case 6:
                        MetodoConservacionAgarSolidoTubo::create($input);
                        break;
                    case 7:
                        $input['microgota'] = $microgota;
                        MetodoConservacionCaldo::create($input);
                        break;
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
        return view('admin/cepa/metodos_conservacion/index',['codigo_cepa' => $codigo_cepa, 'id_cepa'=>$id]);
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
        $tipo_metodo = DB::table('tipo_metodos')->where('id', $request['metodo_conservacion'])->value('tipo');
        $input = [
                'title' => $tipo_metodo,
                'start' => $request['start'],
                'id_tipo' => $request['metodo_conservacion'],
                'numero_replicas' => $request['numero_replicas'],
                'recuento' => $request['recuento']
                ];
            $metodo=MetodosConservacion::where('id',  $id)
                ->update($input);
            $this->actualizarRespectivoMetodoConservacion($metodo['id_tipo'],$request['microgota']);
       
    }

    public function actualizarRespectivoMetodoConservacion($id_tipometodo,$microgota){
        
        switch ($id_tipometodo) {
                    case 1:
                        $input = ['microgota' => $microgota];
                        MetodoConservacionSolucionSalina::where('id',  $id)
                        ->update($input);
                        break;
                    case 2:
                        $input = ['microgota' => $microgota];
                        MetodoConservacionGlicerol::where('id',  $id)
                        ->update($input);
                        break;
                    case 3:
                        $input = ['microgota' => $microgota];
                        MetodoConservacionSuelo::where('id',  $id)
                        ->update($input);
                        break;
                    case 4:
                        MetodoConservacionAgarSemisolido::where('id',  $id)
                        ->update($input);
                        break;
                    case 5:
                        MetodoConservacionAgarSolidoCaja::where('id',  $id)
                        ->update($input);
                        break;
                    case 6:
                        MetodoConservacionAgarSolidoTubo::where('id',  $id)
                        ->update($input);
                        break;
                    case 7:
                        $input = ['microgota' => $microgota];
                        MetodoConservacionCaldo::where('id',  $id)
                        ->update($input);
                        break;
                }
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

    public function metodos(){
        $metodos = DB::table('metodos_conservacion')
        ->leftJoin('metodo_conservacion_solucion_salina', 'metodos_conservacion.id', '=', 'metodo_conservacion_solucion_salina.id_metodo')
        ->leftJoin('metodo_conservacion_glicerol', 'metodos_conservacion.id', '=', 'metodo_conservacion_glicerol.id_metodo')
        ->leftJoin('metodo_conservacion_suelo', 'metodos_conservacion.id', '=', 'metodo_conservacion_suelo.id_metodo')
        ->leftJoin('metodo_conservacion_caldo', 'metodos_conservacion.id', '=', 'metodo_conservacion_caldo.id_metodo')
        ->select('metodos_conservacion.*','metodo_conservacion_solucion_salina.microgota', 'metodo_conservacion_glicerol.microgota', 
            'metodo_conservacion_glicerol.microgota', 'metodo_conservacion_caldo.microgota' )
        ->get();
        return response()->json($metodos);
      
    }

    public function obtenerMetodos(){
        return response()->json(['success'=>TipoMetodo::all()]);
    }
}
