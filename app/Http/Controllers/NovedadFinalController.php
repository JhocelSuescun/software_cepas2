<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Novedad;

class NovedadFinalController extends Controller
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
        $nov = Novedad::get();

        return view('admin/acontecimiento/novedad/index', ['novedad' => $nov]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $nov = Novedad::all();
        return view('admin/acontecimiento/novedad/create');
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
        $keys = ['nombre','informacion'];
        $input = $this->createQueryInput($keys, $request);
        $input['visible'] = '1';

        } else{
        $keys = ['nombre','informacion'];
        $input = $this->createQueryInput($keys, $request);
        $input['visible'] = '0';

        }

         $path = $request->file('imagen')->store('novedad');
        $input['imagen'] = $path;
        
        Novedad::create($input);

        return redirect()->intended('admin/acontecimiento/novedad');
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
        $nov = Novedad::find($id);
        // Redirect to state list if updating state wasn't existed
        /*if ($nov == null || count($nov) == 0) {
            return redirect()->intended('inicio');
        }*/

         $novedades =  DB::table('novedad')
                    ->select('novedad.*')
                    ->where([
                    ['id', '!=', $id],
                    ['publicado', '=', '1']
                ])
                ->paginate(10);
        return view('usuariofinal/novedad/novedad', ['novedad' => $nov, 'novedades' => $novedades, 'id' => $id, ]);
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
        $nov = Novedad::findOrFail($id);
        //$this->validateInput($request);
        // Upload image
        $keys = ['nombre','informacion'];
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



        Novedad::where('id', $id)
            ->update($input);

        return redirect()->intended('admin/acontecimiento/novedad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Novedad::where('id', $id)->delete();
         return redirect()->intended('admin/acontecimiento/novedad');
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
