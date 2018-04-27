<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Noticia;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use Response;

class NoticiasController extends Controller
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
        return view('admin/acontecimiento/noticia/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/acontecimiento/noticia/crearNoticia');
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
            if($request->ajax()){
                 $validator = Validator::make($request->all(), [
                //'nombres' => 'required|max:5'
                ]);
                  

                if ($validator->passes()) {


                       if ($request->file('imagen')) {
                                $path = $request->file('imagen')->store('noticia');
                                $request['imagen'] = $path;
                            }else{
                                $path="";
                            }
                        if($request['publicado']=="on"){
                            $request['publicado']="1";
                        }else{
                            $request['publicado']="0";
                        }
                            Noticia::create([
                                'titulo' => $request['titulo'],
                                'fecha' => $request['fecha'],
                                'informacion' => $request['informacion'],
                                'publicado' => $request['publicado'],
                                'imagen' => $path
                            ]);
                            return response()->json(['success'=>"Se ha registrado la noticia con éxito..."]);
                        
                }


            return response()->json(['error'=>$validator->errors()->all()]);
            }
        }catch(Exception $ex){
           return response()->json(['error'=>'Se ha generado un error']); 
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
         return datatables()->of(DB::table('noticia'))->toJson();
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia=Noticia::find($id);
        return view('admin/acontecimiento/noticia/editarNoticia', ['noticia'=>$noticia]);
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

    public function actualizar(Request $request)
    {
        

            if ($request->file('imagen')) {
            $path = $request->file('imagen')->store('noticia');
            $request['imagen'] = $path;
             $input = [
            'imagen' => $path,
            ];
             Noticia::where('id', $request["id"])
            ->update($input);
            
            }  

            if($request['publicado']=="on"){
                            $request['publicado']="1";
                        }else{
                            $request['publicado']="0";
                        }

            $input = [
                'titulo' => $request['titulo'],
                'fecha' => $request['fecha'],
                'informacion' => $request['informacion'],
                'publicado' => $request['publicado']
            ];
            Noticia::where('id', $request["id"])
            ->update($input);
            return response()->json(['success'=>"Se ha actualizado la noticia exitosamente..."]);
       
    }

     public function eliminar(Request $request)
    {
        try{
            $noticia = Noticia::findOrFail($request['id']);
            Noticia::where('id', $request['id'])->delete();
            return response()->json(['success'=> 'La noticia "'.$noticia['titulo'].'" se ha eliminado correctamente.']);
        }catch(Exception $ex){
            return response()->json(['error'=>'Ha ocurrido un error inesperado']);
        }

    }

    

    public function load($name) {
         $path = storage_path().'/app/noticia/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    public function validar_imagen(Request $request){
       $img = Image::make($request->file('imagen'));
       if($img->height()==550 && $img->width()==1900){
            return response()->json(['success'=>'Las dimensiones de la imagen son adecuadas']);
       }
       return response()->json(['error'=>'Las dimensiones de la imagen deben ser: ancho: 1900, alto:550']);
    }

    public function dataNoticia(){
        return datatables()->of(DB::table('noticias'))->toJson();
    }
}
