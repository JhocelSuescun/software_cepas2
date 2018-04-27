<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Cepa;
use App\Genero;
use App\Especie;
use App\GrupoMicrobiano;
use App\BordeCepa;
use App\ConsistenciaCepa;
use App\DetalleOpticoCepa;
use App\FormaCepa;
use App\ElevacionCepa;
use App\SuperficieCepa;
use App\CepaXMedio;
use App\MedioCepa;
class CepaFinalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

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
        ->select('cepa.*','especie.especie as especie', 'grupo_microbiano.grupo_microbiano as grupomicrobiano', 
            'genero.genero as genero')
        ->where('publicado', '=', '1')
        ->get();



        $cxm = DB::table('cepaxmedio')
        ->leftJoin('medio', 'cepaxmedio.id_medio', '=', 'medio.id')
        ->leftJoin('borde', 'cepaxmedio.id_borde', '=', 'borde.id')
        ->leftJoin('consistencia', 'cepaxmedio.id_consistencia', '=', 'consistencia.id')
        ->leftJoin('detalleoptico', 'cepaxmedio.id_detalleoptico', '=', 'detalleoptico.id')
        ->leftJoin('elevacion', 'cepaxmedio.id_elevacion', '=', 'elevacion.id')
        ->leftJoin('forma', 'cepaxmedio.id_forma', '=', 'forma.id')
        ->leftJoin('superficie', 'cepaxmedio.id_superficie', '=', 'superficie.id')
        ->select('cepaxmedio.*','medio.medio as medio','borde.borde as borde_medio','consistencia.consistencia as consistencia_medio',
            'detalleoptico.detalle_optico as detalle_medio','elevacion.elevacion as elevacion_medio','forma.forma as forma_medio',
            'superficie.superficie as superficie_medio')
        ->get();



  
 
        return view('usuariofinal/cepa/cepa', ['cepas' => $cep, 'cepaxmedio' => $cxm]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gen = Genero::all();
        $esp = Especie::all();
        $gm = GrupoMicrobiano::all();
         
        $codigo_cepa=null;
        $id_grupo=null;
        $id_genero=null;
        $id_especie=null;
        return view('admin/detalle/cepa/create', ['especie' => $esp , 'grupomicrobiano' => $gm, 'genero' => $gen,
            'cod_cep' => $codigo_cepa , 'id_gr' => $id_grupo , 'id_gen' => $id_genero , 'id_esp' => $id_especie
            



            ]);
    }

    public function listaespecies($id){
        return Especie::where('genero_id',"=",$id)->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validateInput($request);
        // Upload image
        $keys = ['codigo', 'id_especie', 'id_grupomicrobiano', 'id_genero',
          'morfologia','tincion_gram','motilidad'];
        $input = $this->createQueryInput($keys, $request);
        if( $request->file('imagen')!=""){
        $path = $request->file('imagen')->store('cepa');
        $input['imagen'] = $path;
        }


         
        $id_grupo=$input['id_grupomicrobiano'];
        $id_genero=$input['id_genero'];
        $id_especie=$input['id_especie'];
        echo "....................".$input['id_genero'];

        

        if($id_genero!="" && !is_numeric($id_genero)){
            echo "entra aca";
            $input2 = [
            'nombre_genero' => $id_genero
        ];
            
            Genero::create($input2);
            $id_genero = DB::table('genero')->where('nombre_genero', $id_genero)->value('id');
             $input['id_genero'] = $id_genero;
        }else{
            echo "/es numero genero/";
        }

        if($id_especie!="" && !is_numeric($id_especie)){
            echo "entra aca";
            $input2 = [
            'nombre_especie' => $id_especie,
            'genero_id' => $id_genero
        ];
            
            Especie::create($input2);
            $id_especie = DB::table('especie')->where('nombre_especie', $id_especie)->value('id');
            $input['id_especie'] = $id_especie;
        }else{
            echo "/es numero especie/";
        }

        if($id_grupo!="" && !is_numeric($id_grupo)){
            echo "entra aca";
            $input2 = [
            'nombre_grupo' => $id_grupo
        ];
            
            GrupoMicrobiano::create($input2);
            $id_grupo = DB::table('grupomicrobiano')->where('nombre_grupo', $id_grupo)->value('id');
            $input['id_grupomicrobiano'] = $id_grupo;
        }else{
            echo "/es numero grupo/";
        }








        $id_cepa = DB::table('cepa')->where('codigo', $input['codigo'])->value('id');
        if($id_cepa==""){
            
        Cepa::create($input);
        }else{
        Cepa::where('id', $id_cepa)
            ->update($input);
         }
        return redirect()->intended('admin/detalle/cepa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cep = Cepa::find($id);
         $codigo = DB::table('cepa')->where('id', $id)->value('codigo');
         $cxm = DB::table('cepaxmedio')
         ->leftJoin('borde', 'cepaxmedio.id_borde', '=', 'borde.id')
        ->leftJoin('consistencia', 'cepaxmedio.id_consistencia', '=', 'consistencia.id')
        ->leftJoin('detalleoptico', 'cepaxmedio.id_detalleoptico', '=', 'detalleoptico.id')
        ->leftJoin('elevacion', 'cepaxmedio.id_elevacion', '=', 'elevacion.id')
        ->leftJoin('forma', 'cepaxmedio.id_forma', '=', 'forma.id')
        ->leftJoin('superficie', 'cepaxmedio.id_superficie', '=', 'superficie.id')
        ->leftJoin('medio', 'cepaxmedio.id_medio', '=', 'medio.id')
        ->select('cepaxmedio.*','borde.borde as borde','consistencia.consistencia as consistencia',
            'detalleoptico.detalle_optico as detalle','elevacion.elevacion as elevacion','forma.forma as forma',
            'superficie.superficie as superficie','medio.medio as medio')
        ->where('id_cepa','=',$id)
        ->get();

        $cf = DB::table('caracterizacion_fisiologica')
         ->leftJoin('cepa', 'caracterizacion_fisiologica.id_cepa', '=', 'cepa.id')
        ->select('caracterizacion_fisiologica.*' , 'cepa.codigo as cepa')
        ->where('id_cepa','=',$id)
        ->get();

         $im = DB::table('identificacion_molecular')
         ->leftJoin('cepa', 'identificacion_molecular.id_cepa', '=', 'cepa.id')
        ->select('identificacion_molecular.*', 'cepa.codigo as cepa')
        ->where('id_cepa','=',$id)
        ->get();
        // Redirect to state list if updating state wasn't existed
        /*if ($cep == null || count($cep) == 0) {
            return redirect()->intended('/cepas');
        }*/

        $cep = DB::table('cepa')
        ->leftJoin('especie', 'cepa.id_especie', '=', 'especie.id')
        ->leftJoin('grupo_microbiano', 'cepa.id_grupomicrobiano', '=', 'grupo_microbiano.id')
        ->leftJoin('genero', 'cepa.id_genero', '=', 'genero.id')
        ->select('cepa.*','especie.especie as especie', 'grupo_microbiano.grupo_microbiano as grupomicrobiano', 
            'genero.genero as genero')
        ->where('cepa.id','=',$id)
        ->get();
       


        return view('usuariofinal/cepa/consulta', ['cepa' => $cep,'cepaxmedio' => $cxm,  'caracterizacionfisiologica' => $cf , 'identificacionmolecular' => $im]);
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
        $cepa = Cepa::findOrFail($id);
       // $this->validateInput($request);
        // Upload image
        $keys = ['codigo', 'id_genero', 'id_especie', 'id_grupomicrobiano',
          'morfologia', 'tincion_gram','motilidad'

        ];
        $input = $this->createQueryInput($keys, $request);

        
        $id_grupo=$input['id_grupomicrobiano'];
        $id_genero=$input['id_genero'];
        $id_especie=$input['id_especie'];
        echo "....................".$input['id_grupomicrobiano'];
        echo "....................".$input['id_genero'];
        echo "....................".$input['id_especie'];
       

       

        if($id_genero!="" && !is_numeric($id_genero)){
            echo "entra aca";
            $input2 = [
            'nombre_genero' => $id_genero
        ];
            
            Genero::create($input2);
            $id_genero = DB::table('genero')->where('nombre_genero', $id_genero)->value('id');
             $input['id_genero'] = $id_genero;
        }else{
            
            echo "/es numero genero/";
        }

        if($id_especie!="" && !is_numeric($id_especie)){
            echo "entra aca";
            if( $id_especie=="ninguno"){
                $input['id_especie']= null;
    }else{
            $input2 = [
            'nombre_especie' => $id_especie,
            'genero_id' => $id_genero
        ];
            
            Especie::create($input2);
            $id_especie = DB::table('especie')->where('nombre_especie', $id_especie)->value('id');
            $input['id_especie'] = $id_especie;
        }
        }else{
            
            echo "/es numero especie/";
        }

        if($id_grupo!="" && !is_numeric($id_grupo)){
            echo "entra aca";
            $input2 = [
            'nombre_grupo' => $id_grupo
        ];
            
            GrupoMicrobiano::create($input2);
            $id_grupo = DB::table('grupomicrobiano')->where('nombre_grupo', $id_grupo)->value('id');
            $input['id_grupomicrobiano'] = $id_grupo;
        }else{
           
            echo "/es numero grupo/";
        }








        if ($request->file('imagen')) {
            $path = $request->file('imagen')->store('cepa');
            $input['imagen'] = $path;
        }

        Cepa::where('id', $id)
            ->update($input);

        return redirect()->intended('/admin/detalle/cepa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $codigo = DB::table('cepa')->where('id', $id)->value('codigo');
         $cepaxmedio = DB::table('cepaxmedio')
         ->paginate();

         echo "codigo es...".$codigo;
         echo "arreglo de cepaxmedio...".$cepaxmedio;
         foreach ($cepaxmedio as $cxm) {
             if($cxm->codigo_cepa==$codigo){
                CepaXMedio::where('id', $cxm->id)->delete();
             }
         }
         Cepa::where('id', $id)->delete();
         
         return redirect()->intended('admin/detalle/cepa');
    }

    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'firstname' => $request['firstname'],
            'department.name' => $request['department_name']
            ];
        $employees = $this->doSearchingQuery($constraints);
        $constraints['department_name'] = $request['department_name'];
        return view('employees-mgmt/index', ['employees' => $employees, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = DB::table('employees')
        ->leftJoin('city', 'employees.city_id', '=', 'city.id')
        ->leftJoin('department', 'employees.department_id', '=', 'department.id')
        ->leftJoin('state', 'employees.state_id', '=', 'state.id')
        ->leftJoin('country', 'employees.country_id', '=', 'country.id')
        ->leftJoin('division', 'employees.division_id', '=', 'division.id')
        ->select('employees.firstname as employee_name', 'employees.*','department.name as department_name', 'department.id as department_id', 'division.name as division_name', 'division.id as division_id');
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }

     /**
     * Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function load($name) {
         $path = storage_path().'/app/cepa/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    private function validateInput($request) {
        $this->validate($request, [
            'lastname' => 'required|max:60',
            'firstname' => 'required|max:60',
            'middlename' => 'required|max:60',
            'address' => 'required|max:120',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'zip' => 'required|max:10',
            'age' => 'required',
            'birthdate' => 'required',
            'date_hired' => 'required',
            'department_id' => 'required',
            'division_id' => 'required'
        ]);
    }

    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}
