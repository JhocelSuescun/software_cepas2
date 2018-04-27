<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\CaracteristicasBioquimicas;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use Toastr;

class CaracteristicasBioquimicasController extends Controller
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
                'oxidasa' => $request['oxidasa'],
                'catalasa' => $request['catalasa'],
                'atrato' => $request['atrato'],
                'tsi' => $request['tsi'],
                'lia' => $request['lia'],
                'sim' => $request['sim'],
                'rm' => $request['rm'],
                'vp' => $request['vp'],
                'nitrato' => $request['nitrato'],
                'caldo_urea' => $request['caldo_urea'],
                'of' => $request['of'],
                'glucosa' => $request['glucosa'],
                'lactosa' => $request['lactosa'],
                'manitol' => $request['manitol'],
                'xilosa' => $request['xilosa'],
                'arabinosa' => $request['arabinosa'],
                'sacarosa' => $request['sacarosa'],
                'otros_azucares' => $request['otros_azucares'],
                'almidon' => $request['almidon'],
                'lecitinasa' => $request['lecitinasa'],
                'lipasa' => $request['lipasa'],
                'otras_enzimas' => $request['otras_enzimas'],
                'hidrolisis_caseina' => $request['hidrolisis_caseina'],
                'hidrolisis_gelatina' => $request['hidrolisis_gelatina'],
                'hidrolisis_urea' => $request['hidrolisis_urea'],
                'crecimiento_nacl' => $request['crecimiento_nacl'],
                'crecimiento_diferentes_temperaturas' => $request['crecimiento_diferentes_temperaturas'],
                'otras_caracteristicas' => $request['otras_caracteristicas']
                
            ];
            CaracteristicasBioquimicas::where('id',  $request['id'])
                ->update($input);
                $cepa_codigo = DB::table('cepa')->where('id', $request['id_cepa'])->value('codigo');
           Toastr::success('Registro exitoso...', 'Características Bioquímicas: '.$cepa_codigo, ["positionClass" => "toast-bottom-right"]);
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
        $id_cb = DB::table('caracteristicas_bioquimicas')->where('id_cepa', $id)->value('id');//evaluo si ya esta creada la identificacion molecular
        if($id_cb==null){
            CaracteristicasBioquimicas::create([
                        'id_cepa' => $id

                        ]);
            
        }
        $id_cb = DB::table('caracteristicas_bioquimicas')->where('id_cepa', $id)->value('id');
        $codigo_cepa = DB::table('cepa')->where('id', $id)->value('codigo');
        $cb = CaracteristicasBioquimicas::find($id_cb);
        return view('admin/cepa/caracteristicas_bioquimicas/form_caracteristicas_bioquimicas', ['cb'=>$cb, 'codigo_cepa' => $codigo_cepa, 'id_cepa'=>$id]);

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
