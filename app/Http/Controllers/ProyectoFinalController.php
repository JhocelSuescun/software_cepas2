<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Cepa;
use App\OrigenCepa;
use App\Proyectos;

use App\BordeCepa;
use App\ConsistenciaCepa;
use App\DetalleOpticoCepa;
use App\FormaCepa;
use App\ElevacionCepa;
use App\SuperficieCepa;
use App\MorfologiaMacroscopica;
use App\InoculacionPlantas;
class ProyectoFinalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proy = DB::table('proyectos')
        ->select('proyectos.*')
        ->where('publicado', '=', '1')
        ->get();

        

        return view('usuariofinal/proyecto/proyecto', ['proyecto' => $proy]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $cep = Cepa::all();
        $ori = OrigenCepa::all();


        $bor = BordeCepa::all();
        $cons = ConsistenciaCepa::all();
        $do = DetalleOpticoCepa::all();
        $ele = ElevacionCepa::all();
        $for = FormaCepa::all();
        $sup = SuperficieCepa::all();



        return view('admin/detalle/proyecto/create', ['cepa' => $cep , 'origen' => $ori,
            'borde' => $bor , 'consistencia' => $cons,'detop' => $do , 'elevacion' => $ele,
            'forma' => $for , 'superficie' => $sup


            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validateInput($request);
        // Upload image
        $keys = ['nombre_proyecto', 'codigo_cepa', 'id_origen', 'fecha_aislamiento','lugaraislamiento', 'nombre_aislador'];
        $input = $this->createQueryInput($keys, $request);
        
        
        Proyecto::create($input);

        

        return redirect()->intended('admin/detalle/proyecto');
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
        $proy = Proyectos::find($id);
        // Redirect to state list if updating state wasn't existed
        /*if ($proy == null || count($proy) == 0) {
            return redirect()->intended('admin/detalle/proyecto');
        }*/
        

         $proyecto = DB::table('proyectos')->where('id', $id)->value('nombre_proyecto');

        $inoculacion = DB::table('inoculacion_plantas')
        ->leftJoin('proyectos', 'inoculacion_plantas.id_proyecto', '=', 'proyectos.id')
        ->select('inoculacion_plantas.*','proyectos.nombre_proyecto as proyecto')
        ->where('inoculacion_plantas.id_proyecto','=',$id)
        ->get();





        return view('usuariofinal/proyecto/consulta', ['proyecto' => $proyecto,  'inoculacion' => $inoculacion]);
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
        $proy = Proyecto::findOrFail($id);
       $this->validateInput($request);
        // Upload image
        $keys = ['nombre_proyecto', 'codigo_cepa', 'id_origen', 'fecha_aislamiento','lugaraislamiento', 'nombre_aislador'];
       $input = $this->createQueryInput($keys, $request);
        


        Proyecto::where('id', $id)
            ->update($input);

        return redirect()->intended('/admin/detalle/proyecto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         InoculacionPlantas::where('id_proyecto', $id)->delete();
         Proyecto::where('id', $id)->delete();
         
         return redirect()->intended('admin/detalle/proyecto');
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
         $path = storage_path().'/app/avatars/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    private function validateInput($request) {
        $this->validate($request, [
            'nombre_proyecto' => 'required|max:200',
            'fecha_aislamiento' => 'required',
            'lugaraislamiento' => 'max:100',
            'nombre_aislador' => 'max:100',
            'codigo_cepa' => 'required'
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
