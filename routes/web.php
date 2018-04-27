<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('home');
});*/



Route::get('/index', function () {
    return view('admin/index');
});


Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('/duro', function () {
    return view('design2');
});

Route::get('/rojobonito', function () {
    return view('contentrojo');
});

Route::get('/admin2', 'CaracteristicasController@index');

/*************rutas validas****************************************/
Route::get('admin/datos_personales', 'AdminController@index');
Route::post('admin/actualizar', 'AdminController@update')->name('admin.actualizar');
Route::get('admin/caracteristicas', 'CaracteristicasController@index');


/*****************Rutas Mostrar Imagenes******************************/
Route::get('admin/investigador/{name}', 'InvestigadorController@load');
Route::get('admin/noticia/{name}', 'NoticiasController@load');
Route::get('admin/novedad/{name}', 'NovedadController@load');
Route::get('admin/drop/{name}', 'ProjectImageController@load');
Route::get('admin/admin/{name}', 'AdminController@load');

/*****************Rutas Recursos******************************/
Route::resource('borde', 'BordeController');
Route::resource('consistencia', 'ConsistenciaController');
Route::resource('detalleoptico', 'DetalleOpticoController');
Route::resource('elevacion', 'ElevacionController');
Route::resource('forma', 'FormaController');
Route::resource('superficie', 'SuperficieController');
Route::resource('genero', 'GeneroController');
Route::resource('especie', 'EspecieController');
Route::resource('grupomicrobiano', 'GrupoMicrobianoController');
Route::resource('origen', 'OrigenController');
Route::resource('medio', 'MedioController');
Route::resource('admin/investigadores', 'InvestigadorController');
Route::resource('admin/cepa', 'CepaController');
Route::resource('admin/cepa/medios_selectivos', 'CepaXMedioController');
Route::resource('admin/cepa/caracteristicas_microscopicas', 'CaracteristicasMicroscopicasController');
Route::resource('admin/cepa/caracteristicas_bioquimicas', 'CaracteristicasBioquimicasController');
Route::resource('admin/cepa/identificacion_molecular', 'IdentificacionMolecularController');
Route::resource('admin/cepa/caracterizacion_fisiologica', 'CaracterizacionFisiologicaController');
Route::resource('admin/cepa/metodos_conservacion', 'MetodosConservacionController');
Route::resource('admin/proyectos', 'ProyectosController');
Route::resource('admin/proyectos/inoculacion_plantas', 'InoculacionPlantasController');
Route::resource('admin/noticias', 'NoticiasController');
Route::resource('admin/novedades', 'NovedadController');

/*****************Rutas Registro******************************/
Route::post('/cepaxmedio/store', 'CepaXMedioController@store')->name('cepaxmedio.store');
/*
Route::post('/borde/store', 'BordeController@store');
Route::post('/consistencia/store', 'ConsistenciaController@store');
Route::post('/detalleoptico/store', 'DetalleOpticoController@store');
Route::post('/elevacion/store', 'ElevacionController@store');
Route::post('/forma/store', 'FormaController@store');
Route::post('/superficie/store', 'SuperficieController@store');
Route::post('/genero/store', 'GeneroController@store');
Route::post('/especie/store', 'EspecieController@store');
Route::post('/grupomicrobiano/store', 'GrupoMicrobianoController@store');
Route::post('/origen/store', 'OrigenController@store');
Route::post('/medio/store', 'MedioController@store');
Route::post('/investigador/store', 'InvestigadorController@store');
Route::post('/cepa/store', 'CepaController@store');
Route::post('/cepaxmedio/store', 'CepaXMedioController@store');
Route::post('/identificacion_molecular/store', 'IdentificacionMolecularController@store');
Route::post('/caracterizacion_fisiologica/store', 'CaracterizacionFisiologicaController@store');
Route::post('/proyectos/store', 'ProyectosController@store');
Route::post('/inoculacion_plantas/store', 'InoculacionPlantasController@store');
Route::post('/noticias/store', 'NoticiasController@store');
Route::post('/novedades/store', 'NovedadController@store');
/**************Rutas Update**************************************/
Route::post('admin/cepa/actualizar', 'CepaController@actualizar')->name('cepa.actualizar');
Route::post('admin/cepaxmedio/actualizar', 'CepaXMedioController@actualizar')->name('medios_selectivos.actualizar');
Route::post('admin/caracterizacion_fisiologica/actualizar', 'CaracterizacionFisiologicaController@actualizar')->name('caracterizacion_fisiologica.actualizar');
Route::post('admin/proyectos/actualizar', 'ProyectosController@actualizar')->name('proyectos.actualizar');
Route::post('admin/inoculacion_plantas/actualizar', 'InoculacionPlantasController@actualizar')->name('inoculacion_plantas.actualizar');
Route::post('admin/noticias/actualizar', 'NoticiasController@actualizar')->name('noticias.actualizar');
Route::post('admin/novedades/actualizar', 'NovedadController@actualizar')->name('novedades.actualizar');
/*****************Rutas Elimiacion Registros******************************/
Route::get('/eliminarBorde','BordeController@eliminar')->name("borde.eliminar");
Route::get('/eliminarConsistencia','ConsistenciaController@eliminar')->name("consistencia.eliminar");
Route::get('/eliminarDetalleOptico','DetalleOpticoController@eliminar')->name("detalleoptico.eliminar");
Route::get('/eliminarElevacion','ElevacionController@eliminar')->name("elevacion.eliminar");
Route::get('/eliminarForma','FormaController@eliminar')->name("forma.eliminar");
Route::get('/eliminarSuperficie','SuperficieController@eliminar')->name("superficie.eliminar");
Route::get('/eliminarGenero','GeneroController@eliminar')->name("genero.eliminar");
Route::get('/eliminarEspecie','EspecieController@eliminar')->name("especie.eliminar");
Route::get('/eliminarGrupo','GrupoMicrobianoController@eliminar')->name("grupomicrobiano.eliminar");
Route::get('/eliminarOrigen','OrigenController@eliminar')->name("origen.eliminar");
Route::get('/eliminarMedio','MedioController@eliminar')->name("medio.eliminar");
Route::get('admin/eliminarInvestigador','InvestigadorController@eliminar')->name("investigador.eliminar");
Route::get('admin/eliminarCepa','CepaController@eliminar')->name("cepa.eliminar");
Route::get('admin/eliminarCepaXMedio','CepaXMedioController@eliminar')->name("medios_selectivos.eliminar");
Route::get('admin/eliminarCaracterizacionFisiologica','CaracterizacionFisiologicaController@eliminar')->name("caracterizacion_fisiologica.eliminar");
Route::get('admin/eliminarProyectos','ProyectosController@eliminar')->name("proyectos.eliminar");
Route::get('admin/eliminarInoculacionPlantas','InoculacionPlantasController@eliminar')->name("inoculacion_plantas.eliminar");;
Route::get('admin/eliminarNoticias','NoticiasController@eliminar')->name("noticias.eliminar");
Route::get('admin/eliminarNovedades','NovedadController@eliminar')->name("novedades.eliminar");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('ajaxRequest', 'HomeController@ajaxRequest');

Route::post('ajaxRequest', 'HomeController@ajaxRequestPost');

/***********************Datatables***********************/
Route::get('borde/databorde', 'BordeController@dataBorde')->name('borde.databorde');
Route::get('consistencia/dataconsistencia', 'ConsistenciaController@dataConsistencia')->name('consistencia.dataconsistencia');
Route::get('detalleoptico/datadetalleoptico', 'DetalleOpticoController@dataDetalleOptico')->name('detalleoptico.datadetalleoptico');
Route::get('elevacion/dataelevacion', 'ElevacionController@dataElevacion')->name('elevacion.dataelevacion');
Route::get('forma/dataforma', 'FormaController@dataForma')->name('forma.dataforma');
Route::get('especie/dataespecie', 'EspecieController@dataEspecie')->name('especie.dataespecie');
Route::get('genero/datagenero', 'GeneroController@dataGenero')->name('genero.datagenero');
Route::get('superficie/datasuperficie', 'SuperficieController@dataSuperficie')->name('superficie.datasuperficie');
Route::get('medio/datamedio', 'MedioController@dataMedio')->name('medio.datamedio');
Route::get('origen/dataorigen', 'OrigenController@dataOrigen')->name('origen.dataorigen');
Route::get('grupomicrobiano/datagrupomicrobiano', 'GrupoMicrobianoController@dataGrupoMicrobiano')->name('grupomicrobiano.datagrupomicrobiano');
Route::get('admin/investigadorborde/datainvestigador', 'InvestigadorController@dataInvestigador')->name('investigador.datainvestigador');
Route::get('admin/cepa/datacepa', 'CepaController@dataCepa')->name('cepa.datacepa');
Route::get('admin/proyectos/dataproyectos', 'ProyectosController@dataProyecto')->name('proyectos.dataproyectos');
Route::get('admin/noticias/datanoticias', 'NoticiasController@dataNoticia')->name('noticias.datanoticias');
Route::get('admin/novedades/datanovedades', 'NovedadesController@dataNovedad')->name('novedades.datanovedades');

Route::get('ajaxdata', 'AjaxdataController@index')->name('ajaxdata');

Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');
Route::get('bordes/getBordes', 'BordeController@dataBordes')->name('ajaxdata.getbordes');
Route::get('my-form','HomeController@myform');
Route::post('my-form','HomeController@myformPost');
Route::post('genero/generos','GeneroController@obtenerGeneros')->name('genero.generos');//carga generos en el submenu de caracteristicas
Route::post('especie/especies','EspecieController@obtenerEspecies')->name('especie.especies');//carga especie en el submenu de cepas
Route::post('grupomicrobiano/grupos','GrupoMicrobianoController@obtenerGrupos')->name('grupomicrobiano.grupos');//carga grupos en el submenu de cepas
Route::post('origen/origenes','OrigenController@obtenerOrigenes')->name('origen.origenes');//carga origen en el submenu de cepas
Route::post('medio/medios','MedioController@obtenerMedios')->name('medio.medios');//carga superficies en el submenu de cepasxmedio
Route::post('borde/bordes','BordeController@obtenerBordes')->name('borde.bordes');//carga bordes en el submenu de cepasxmedio
Route::post('consistencia/consistencias','ConsistenciaController@obtenerConsistencias')->name('consistencia.consistencias');//carga consistencias en el submenu de cepasxmedio
Route::post('detalleoptico/detalles','DetalleOpticoController@obtenerDetalles')->name('detalleoptico.detalles');//carga detalles en el submenu de cepasxmedio
Route::post('elevacion/elevaciones','ElevacionController@obtenerElevaciones')->name('elevacion.elevaciones');//carga elevaciones en el submenu de cepasxmedio
Route::post('forma/formas','FormaController@obtenerFormas')->name('forma.formas');//carga formas en el submenu de cepasxmedio
Route::post('superficie/superficies','SuperficieController@obtenerSuperficies')->name('superficie.superficies');//carga superficies en el submenu de cepasxmedio
Route::post('admin/cepa/cepas','ProyectosController@obtenerCepas')->name('cepa.cepas');//carga superficies en el submenu de cepasxmedio
Route::post('admin/investigador/obtenerInvestigadores','InvController@obtenerInvestigadores');//carga superficies en el submenu de cepasxmedio
Route::post('metodo/metodos','MetodosConservacionController@obtenerMetodos')->name('metodo.metodos');//carga consistencias en el submenu de cepasxmedio
Route::get('metodo/metodos_calendario','MetodosConservacionController@metodos')->name('metodo.metodos_calendario');//carga consistencias en el submenu de cepasxmedio
/***********************Nuevas*********************/
//Route::get('cepa/{id}/medios_selectivos', 'CepaXMedioController@mediosSelectivos')->name('mediosSelectivos');
Route::post('admin/cepaxmedio/listarCepaXMedio','CepaXMedioController@listarCepaXMedio')->name('medios_selectivos.data_medios_selectivos');//carga superficies en el submenu de cepasxmedio
Route::get('admin/cepa/{id}/medios_selectivos', 'CepaXMedioController@show')->name('medios_selectivos.mostrar');
Route::get('admin/cepa/{id_cepa}/medios_selectivos/{id}/edit', 'CepaXMedioController@edit');
Route::get('admin/cepa/{id}/medios_selectivos/crear', 'CepaXMedioController@crear')->name('medios_selectivos.crear');
Route::get('admin/cepa/{id}/identificacion_molecular', 'IdentificacionMolecularController@show')->name('identificacion_molecular.mostrar');;
Route::post('admin/caracterizacion_fisiologica/listarCaracterizaciones','CaracterizacionFisiologicaController@listarCaracterizaciones')->name('caracterizacion_fisiologica.data_caracterizaciones');//carga superficies en el submenu de cepasxmedio
Route::get('admin/cepa/{id}/caracterizacion_fisiologica', 'CaracterizacionFisiologicaController@show')->name('caracterizacion_fisiologica.mostrar');;
Route::get('admin/cepa/{id}/caracterizacion_fisiologica/crear', 'CaracterizacionFisiologicaController@crear')->name('caracterizacion_fisiologica.crear');
Route::get('admin/cepa/{id_cepa}/caracterizacion_fisiologica/{id}/edit', 'CaracterizacionFisiologicaController@edit');
Route::get('admin/proyectos/{id}/inoculacion_plantas', 'ProyectosController@showInoculacion')->name('inoculacion_plantas.mostrar');;
Route::post('admin/proyectos/listarInoculaciones','InoculacionPlantasController@listarInoculaciones')->name('inoculacion_plantas.data_inoculaciones');//carga superficies en el submenu de cepasxmedio
Route::get('admin/proyectos/{id}/inoculacion_plantas/crear', 'InoculacionPlantasController@crear')->name('inoculacion_plantas.crear');
Route::get('admin/proyectos/{id_proyecto}/inoculacion_plantas/{id}/edit', 'InoculacionPlantasController@edit');
Route::get('admin/cepa/{id}/caracteristicas_bioquimicas', 'CaracteristicasBioquimicasController@show')->name('caracteristicas_bioquimicas.mostrar');
Route::get('admin/cepa/{id}/caracteristicas_microscopicas', 'CaracteristicasMicroscopicasController@show')->name('caracteristicas_microscopicas.mostrar');
Route::get('admin/cepa/{id}/metodos_conservacion', 'MetodosConservacionController@show')->name('metodos_conservacion.mostrar');
/************validar imagenes**************************/
Route::post('admin/investigador/validar_imagen', 'InvestigadorController@validar_imagen')->name('investigador.validar_imagen');
Route::post('admin/noticias/validar_imagen', 'NoticiasController@validar_imagen')->name('noticias.validar_imagen');


/********************publicar***********************/
Route::get('admin/publicarCepa','CepaController@publicar')->name('cepa.publicar');
Route::get('admin/publicarProyectos','ProyectosController@publicar')->name('proyectos.publicar');



Route::get('/logout', function(){
	return redirect()->route('/admin');
});

/************************************FINAL***********************/
Route::get('/', 'InicioController@index');
Route::get('/cepas', 'CepaFinalController@index');
Route::get('/proyecto', 'ProyectoFinalController@index');
Route::get('/investigadoress','InvestigadorFinalController@index');
Route::get('/novedad/consultar/{id}', 'NovedadFinalController@edit');//////////////////////////////////
Route::get('/noticia/consultar/{id}', 'NoticiaFinalController@edit');/////////////////////////////////
Route::get('/cepa/consultar/{id}', 'CepaFinalController@edit');/////////////////////////////////
Route::get('/proyecto/consultar/{id}', 'ProyectoFinalController@edit');/////////////////////////////////

Route::get('investigador/{name}', 'InvestigadorFinalController@load');
Route::get('cepa/{name}', 'CepaFinalController@load');
Route::get('noticia/{name}', 'InicioController@loadnoticia');
Route::get('novedad/{name}', 'InicioController@loadnovedad');
Route::get('proyecto/imagenes/{name}', 'InicioController@loadimagen');


/*********************************************************************/
Route::get('/cargarimagenes', 'ProjectImageController@cargar')->name('imagen.cargar');
//Route::get('/proyecto/imagenes', 'ProjectImageController@index');
Route::post('/storeimagenes', 'ProjectImageController@upload')->name("imagen.subir");
Route::post('/eliminarimagenes', 'ProjectImageController@delete')->name("imagen.eliminar");

Route::get('/metodos', 'MetodosConservacionController@metodos')->name('metodos_conservacion.metodos');

Route::get('events', 'EventController@index')->name('evento.index');
Route::post('storeevents', 'EventController@store')->name('evento.store');
Route::get('admin/cepa/{id}/metodos_conservacion/nuevo/{fecha}','EventController@cargarForm')->name('evento.cargar');
