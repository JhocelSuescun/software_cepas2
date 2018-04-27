<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

use App\Investigador;
use App\Novedad;
use App\Administrador;

class InvestigadorFinalController extends Controller
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
       // $id='1';
      $inv= DB::table('investigador')
        ->select('investigador.*')
        ->paginate(9);
        return view('/usuariofinal/investigador/investigador', ['investigador' => $inv]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $adm = Administrador::all();
        return view('admin/investigador/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $keys = ['nombres', 'apellidos', 'email', 'url_cvlac', 'codigo'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->file('imagen')) {
            $path = $request->file('imagen')->store('investigador');
            $input['imagen'] = $path;
        }




      
        
        Investigador::create($input);

/*
        if($request['password']!=null){
                if($request['password']!=""){
            $keys = ['nombres', 'codigo'];
            $input = $this->createQueryInput($keys, $request);
              $input['password']=bcrypt($request['password']);
            
            Administrador::create($input);
        }
    }*/

        return redirect()->intended('admin/investigador');
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
        $inv= Investigador::all();
        return view('/admin/investigador/index', ['investigador' => $inv]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $inv = Investigador::find($id);
        $codigo = DB::table('investigador')->where('id', $id)->value('codigo');
        $id_admin = DB::table('administradors')->where('codigo', $codigo)->value('id');

        
        // Redirect to state list if updating state wasn't existed
        if ($inv == null || count($inv) == 0) {
            return redirect()->intended('admin');
        }
       
        return view('admin/investigador/edit', ['investigador' => $inv,'id_admin' => $id_admin]);
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
        $inv = Investigador::findOrFail($id);
        //$this->validateInput($request);
        // Upload image
        $keys = ['nombres', 'apellidos','email', 'url_cvlac', 'codigo'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->file('imagen')) {
            $path = $request->file('imagen')->store('investigador');
            $input['imagen'] = $path;
        }

        
       /* $input2['codigo'] = '1111';*/
        Investigador::where('id', $id)
            ->update($input);

        
       /* Administrador::where('codigo', $inv->codigo)
            ->update(['codigo'=>$input['codigo']]);

             if($request['password']!=null){
                if($request['password']!=""){
            $keys = ['nombres', 'codigo'];
            $input = $this->createQueryInput($keys, $request);
              $input['password']=bcrypt($request['password']);
            
            Administrador::create($input);
        }
    }*/

     return redirect()->intended('admin/investigador/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             $inv = Investigador::findOrFail($id);
            /*$codigo = DB::table('investigador')->where('id', $id)->value('codigo');
            $id_admin = DB::table('administradors')->where('codigo', $codigo)->value('id');
        Administrador::where('id', $id_admin)->delete();*/
         Investigador::where('id', $id)->delete();
         return redirect()->intended('admin/investigador/index');
    }

    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'nombre' => $request['novedad']
           
            ];
        $nov = $this->doSearchingQuery($constraints);
       return view('admin/acontecimiento/novedad/index', ['novedad' => $nov, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = DB::table('novedad');
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
         $path = storage_path().'/app/investigador/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    private function validateInput($request) {
        $this->validate($request, [
            'nombre' => 'required|max:60',
            'detalles' => 'required|max:500'
            
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
