<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Noticia;
use App\Novedad;


class InicioController extends Controller
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
        $not = Noticia::paginate(5);
        $not =  DB::table('noticia')
                    ->select('noticia.*')
                    ->where('publicado', '=', '1')
                ->paginate(5);
        $nov = DB::table('novedad')
                    ->select('novedad.*')
                    ->where('publicado', '=', '1')
                ->paginate(5);

        
        return view('inicio', ['noticia' => $not, 'novedad' => $nov]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $not = Noticia::all();
        return view('admin/acontecimiento/noticia/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         if ($request['visible']=="on") {
        $keys = ['descripcion','informacion'];
        $input = $this->createQueryInput($keys, $request);
        $input['visible'] = '1';

        } else{
        $keys = ['descripcion','informacion'];
        $input = $this->createQueryInput($keys, $request);
        $input['visible'] = '0';

        }

        $path = $request->file('imagen')->store('noticia');
        $input['imagen'] = $path;


        
        Noticia::create($input);

        return redirect()->intended('admin/acontecimiento/noticia');
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
        $not = Noticia::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($not == null || count($not) == 0) {
            return redirect()->intended('admin/acontecimiento/noticia');
        }
       
        return view('admin/acontecimiento/noticia/edit', ['noticia' => $not]);
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
        $not = Noticia::findOrFail($id);
        //$this->validateInput($request);
        // Upload image
        $keys = ['descripcion','informacion'];
        $input = $this->createQueryInput($keys, $request);
        
        if ($request['visible']=="on") {
            
        $input['visible'] = '1';

        } else{
          
        $input['visible'] = '0';

        }

        if ($request->file('imagen')) {
            $path = $request->file('imagen')->store('noticia');
            $input['imagen'] = $path;
        }



        Noticia::where('id', $id)
            ->update($input);

        return redirect()->intended('admin/acontecimiento/noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Noticia::where('id', $id)->delete();
         return redirect()->intended('admin/acontecimiento/noticia');
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
    public function loadnovedad($name) {
         
        $path = storage_path().'/app/novedad/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }
    public function loadnoticia($name) {
         $path = storage_path().'/app/noticia/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
        
    }

    public function loadimagen($name) {
        echo "holi";
         $path = storage_path().'/app/novedad/'.$name;
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
