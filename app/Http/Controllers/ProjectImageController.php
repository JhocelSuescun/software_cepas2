<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ProjectImage;
use App\Proyectos;
use Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Exception\NotReadableException;
use Response;

class ProjectImageController extends Controller
{
	public function index()
	{
	    return view('dropzone')->with(compact('project'));
	}

	public function upload(Request $request)
{
		
	
	
		//debido a que cuando se envian todas las immagenes, se envian los inputs que ya se han enviado antes
		//tocaa validar para que la descripcion le corresponda a la imagen
	    $files = $request->file('file');
	    $i=0;
	    $textos=$request['texto'];
	    if(count($textos)>=count($files)){
	    	$i=count($textos)-count($files);
	    }

            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
                $path = storage_path().'/app/drop/';
			    $fileName = 'drop/'.uniqid() . $file->getClientOriginalName();
			    $file->move($path, $fileName);
			    $imagen = ProjectImage::create([
			    	'id_projecto'=>'2',
			    	'file_name'=>$fileName,
			    	'description'=>$request['datos'],
			    	]);//guardo todo el ultimo registro
       			$i++;
            }
	
		
    return response()->json(['data'=>$imagen['id']]); 

    
}

public function delete(Request $request){
	/*$imagenes = DB::table('project_images')
        ->select('project_images.description')
        ->get();*/

        $file_name = DB::table('project_images')->where('id', $request['id'])->value('file_name');
        ProjectImage::where('id', $request['id'])->delete();
        Storage::delete($file_name);

       /* foreach ($imagenes as $img) {
        	/*
        }*/
        return response()->json(['success'=> 'Se ha eliminado correctamente.']);
	}


public function cargar(){
	
	$project = ProjectImage::all();
	$array=array();
	 $i=0;
	foreach($project as $imagen){
		 
		
	        $array[$i] = ['size' => Storage::size($imagen['file_name']), 'imagen' => $imagen];
	    $i++;
	}
	

	
        return $array;
	
}

public function load($name) {
         
        $path = storage_path().'/app/drop/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }
}
