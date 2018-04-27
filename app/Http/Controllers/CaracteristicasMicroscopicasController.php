<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\CaracteristicasMicroscopicas;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use Toastr;

class CaracteristicasMicroscopicasController extends Controller
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
        $input = [
                'forma' => $request['forma'],
                'ordenamiento' => $request['ordenamiento'],
                'tincion_gram' => $request['tincion_gram'],
                'estado_tincion_esporas' => $request['estado_tincion_esporas'],
                'ubicacion_esporas' => $request['ubicacion_esporas'],
                'tincion_capsula' => $request['tincion_capsula'],
                'otras_caracteristicas' => $request['otras_caracteristicas']
                
            ];
            CaracteristicasMicroscopicas::where('id',  $request['id'])
                ->update($input);
                $cepa_codigo = DB::table('cepa')->where('id', $request['id_cepa'])->value('codigo');
           Toastr::success('Registro exitoso...', 'Características Microscópicas: '.$cepa_codigo, ["positionClass" => "toast-bottom-right"]);
            return redirect('admin/cepa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $id_cmi = DB::table('caracteristicas_microscopicas')->where('id_cepa', $id)->value('id');//evaluo si ya esta creada la identificacion molecular
        if($id_cmi==null){
            CaracteristicasMicroscopicas::create([
                        'id_cepa' => $id

                        ]);
            
        }
        $id_cmi = DB::table('caracteristicas_microscopicas')->where('id_cepa', $id)->value('id');
        $codigo_cepa = DB::table('cepa')->where('id', $id)->value('codigo');
        $cmi = CaracteristicasMicroscopicas::find($id_cmi);
        return view('admin/cepa/caracteristicas_microscopicas/form_caracteristicas_microscopicas', ['cmi'=>$cmi, 'codigo_cepa' => $codigo_cepa, 'id_cepa'=>$id]);

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
}
