/*********************************ADMIN*******************************************/
$(document).ready(function() {
	$("#cancelarAdmin").click(function(e){//cuando da click en el boton cancelar del modal
			$("#modalAdmin").modal('hide');//cierra el modal
		});

	$('#form_admin').submit(function ( e ) {
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url: route('admin.actualizar').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	$("#modalAdmin").modal('hide');
	                	swal('Excelente!', data.success, 'success')
	                	.then(function() {
	                		location.reload(true);//recarga la pagina
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
    e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
});
})

/*************************************BORDE***************************************************/
var menuDatatable=[ 5, 10, 25, 50, 100,150 ];// menu del datatable de mostrar registros
function printErrorMsg (msg) {
			try{
				//$(".print-error-msg").find("ul").html('');
				//$(".print-error-msg").css('display','block');
				var errores="";
				$.each( msg, function( key, value ) {
				//	$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
					errores=errores+"\n"+value;
					
				});
				swal("Error", errores, "error");
			}catch(error){
				swal("Error", msg, "error");
			}
}

function printSuccessMsg (msg, caracteristica) {
	switch (caracteristica) {
    case "borde":
        $("#modalBorde").modal('hide');
        listarBordes();
        break; 
    case "consistencia":
        $("#modalConsistencia").modal('hide');
        listarConsistencias();
        break; 
    case "do"://detalle optico
        $("#modalDetalleOptico").modal('hide');
        listarDetalles();
        break; 
    case "elevacion":
        $("#modalElevacion").modal('hide');
        listarElevaciones();
        break; 
    case "forma":
        $("#modalForma").modal('hide');
        listarFormas();
        break; 
    case "superficie":
        $("#modalSuperficie").modal('hide');
        listarSuperficies();
        break; 
    case "genero":
        $("#modalGenero").modal('hide');
        listarGeneros();
        break; 
    case "especie":
        $("#modalEspecie").modal('hide');
        listarEspecies();
        break; 
	
	case "grupo":
        $("#modalGrupoMicrobiano").modal('hide');
        listarGrupos();
        break; 
	
	case "origen":
        $("#modalOrigen").modal('hide');
        listarOrigenes();
        break; 
	
	case "medio":
        $("#modalMedio").modal('hide');
        listarMedios();
        break; 
	
	}
	swal("Excelente!", msg, "success");
}

/*
function printSuccessMsg (msg, caracteristica) {
	//$(".print-success-msg").fadeIn();
	$("#modalEspecie").modal('hide');
	//$(".print-error-msg").fadeOut();
	//$(".print-success-msg").fadeOut(3000);
	listarEspecies();
	swal("Excelente!", msg, "success");
}*/



/*************************************BORDE***************************************************/
$(document).ready(function() {
	listarBordes();//funcion que lista en el datatable los bordes
	$("#añadirBorde").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var borde = $("input[name='borde']").val();//obtengo la caracteristica del formulario
	    	var id = $("input[name='id_borde']").val();//obtengo el id de la caracteristica del formulario
	    	var id_cepa=$("input[name='id_cepa']").val();//obtengo el id de la cepa en el caso que se va a añadir un borde en cepaxmedio
	    	
	    	$.ajax({//peticion ajax
	            url:  route('borde.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, borde:borde, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"borde");
	                	var pathname = window.location.pathname;
	                	var array=pathname.split("/");
						if(array[array.length-1]=="crear"){//valido que se encuentre en la url crear cepaxmedio
            				bordesSelect();
							console.log(data);
							$(document).ajaxStop(function(){
								$('#select_borde').val(data.id).trigger('change.select2');
							});
								
						}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarBorde").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalBorde").modal('hide');//cierra el modal
	});

	$('#modalBorde').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$("input[name='id_borde']").val("");
	});


});

function listarBordes(){//metodo de listar la caracteristica determinada
	$("#tableBordes tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	var table=$('#tableBordes').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
   	 "ajax": route('borde.databorde').url(),
    "columns":[
    {"data":"borde"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"
                   
    }
    ],
    
	});
	
	actualizarBorde("#tableBordes tbody",table);
	eliminarBorde("#tableBordes tbody",table);
	
}

function printErrorMsgBorde (msg) {
			//$(".print-error-msg").find("ul").html('');
			//$(".print-error-msg").css('display','block');
			var errores="";
			$.each( msg, function( key, value ) {
			//	$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
				errores=errores+"\n"+value;
				
			});
			swal("Error", errores, "error");
}

function printSuccessMsgBorde (msg) {
	//$(".print-success-msg").fadeIn();
	$("#modalBorde").modal('hide');
	//$(".print-error-msg").fadeOut();
	//$(".print-success-msg").fadeOut(3000);
	listarBordes();
	swal("Excelente!", msg, "success");
}


function actualizarBorde(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		
		$("input[name='borde']").val(data.borde);
		$("input[name='id_borde']").val(data.id);
		$("#modalBorde").modal('show');
	});
}

function eliminarBorde(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar el borde: '+data.borde+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {

		  if (result) {
		  	
		  	eliminarBordeAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarBordeAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('borde.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarBordes();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************CONSISTENCIAS***************************************************/

$(document).ready(function() {
	listarConsistencias();//funcion que lista en el datatable las consistencias
	
	$("#añadirConsistencia").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var consistencia = $("input[name='consistencia']").val();//obtengo la caracteristica del formulario
	    	var id = $("input[name='id_consistencia']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url:  route('consistencia.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, consistencia:consistencia, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"consistencia");
	                	var pathname = window.location.pathname;
	                	var array=pathname.split("/");
						if(array[array.length-1]=="crear"){//valido que se encuentre en la url crear cepaxmedio
            				consistenciasSelect();
							console.log(data);
							$(document).ajaxStop(function(){
								$('#select_consistencia').val(data.id).trigger('change.select2');
							});
								
						}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarConsistencia").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalConsistencia").modal('hide');//cierra el modal
	});

	$('#modalConsistencia').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$("input[name='id_consistencia']").val("");
	});


});

function listarConsistencias(){//metodo de listar la caracteristica determinada
	$("#tableConsistencia tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableConsistencia').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('consistencia.dataconsistencia').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"consistencia"},
    {"defaultContent": "<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"
    /*"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    */
    }
    ],
    
	});
	
	actualizarConsistencia("#tableConsistencia tbody",table);
	eliminarConsistencia("#tableConsistencia tbody",table);
	
}

function printErrorMsgConsistencia (msg) {
			//$(".print-error-msg").find("ul").html('');
			//$(".print-error-msg").css('display','block');
			var errores="";
			$.each( msg, function( key, value ) {
			//	$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
				errores=errores+"\n"+value;
				
			});
			swal("Error", errores, "error");
}

function printSuccessMsgConsistencia (msg) {
	//$(".print-success-msg").fadeIn();
	$("#modalConsistencia").modal('hide');
	//$(".print-error-msg").fadeOut();
	//$(".print-success-msg").fadeOut(3000);
	listarConsistencias();
	swal("Excelente!", msg, "success");
}


function actualizarConsistencia(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		$("input[name='consistencia']").val(data.consistencia);
		$("input[name='id_consistencia']").val(data.id);
		$("#modalConsistencia").modal('show');
	});
}

function eliminarConsistencia(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar la consistencia: '+data.consistencia+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarConsistenciaAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarConsistenciaAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	           url:  route('consistencia.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarConsistencias();
	                swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************DETALLES OPTICOS***************************************************/

$(document).ready(function() {
	listarDetalles();//funcion que lista en el datatable los detalles
	
	$("#añadirDetalleOptico").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var detalle_optico = $("input[name='detalle_optico']").val();//obtengo la caracteristica del formulario
	    	var id = $("input[name='id_detalle']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url:  route('detalleoptico.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, detalle_optico:detalle_optico, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"do");
	                	var pathname = window.location.pathname;
	                	var array=pathname.split("/");
						if(array[array.length-1]=="crear"){//valido que se encuentre en la url crear cepaxmedio
            				detallesopticosSelect();
							console.log(data);
							$(document).ajaxStop(function(){
								$('#select_detalleoptico').val(data.id).trigger('change.select2');
							});
								
						}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarDetalleOptico").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalDetalleOptico").modal('hide');//cierra el modal
	});

	$('#modalDetalleOptico').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$("input[name='id_detalle']").val("");
	});


});

function listarDetalles(){//metodo de listar la caracteristica determinada
	$("#tableDetalleOptico tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableDetalleOptico').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('detalleoptico.datadetalleoptico').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"detalle_optico"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"

    }
    ],
    
	});
	
	actualizarDetalleOptico("#tableDetalleOptico tbody",table);
	eliminarDetalleOptico("#tableDetalleOptico tbody",table);
	
}

function printErrorMsgDetalleOptico(msg) {
			//$(".print-error-msg").find("ul").html('');
			//$(".print-error-msg").css('display','block');
			var errores="";
			$.each( msg, function( key, value ) {
			//	$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
				errores=errores+"\n"+value;
				
			});
			swal("Error", errores, "error");
}

function printSuccessMsgDetalleOptico (msg) {
	//$(".print-success-msg").fadeIn();
	$("#modalDetalleOptico").modal('hide');
	//$(".print-error-msg").fadeOut();
	//$(".print-success-msg").fadeOut(3000);
	listarDetalles();
	swal("Excelente!", msg, "success");
}


function actualizarDetalleOptico(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		$("input[name='detalle_optico']").val(data.detalle_optico);
		$("input[name='id_detalle']").val(data.id);
		$("#modalDetalleOptico").modal('show');
	});
}

function eliminarDetalleOptico(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar el Detalle Óptico: '+data.detalle_optico+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarDetalleOpticoAjax(data.id);
		   	
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarDetalleOpticoAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('detalleoptico.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarDetalles();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************ELEVACIONES***************************************************/

$(document).ready(function() {
	listarElevaciones();//funcion que lista en el datatable las elevaciones
	
	$("#añadirElevacion").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var elevacion = $("input[name='elevacion']").val();//obtengo la caracteristica del formulario
	    	var id = $("input[name='id_elevacion']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url:  route('elevacion.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, elevacion:elevacion, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"elevacion");
	                	var pathname = window.location.pathname;
	                	var array=pathname.split("/");
						if(array[array.length-1]=="crear"){//valido que se encuentre en la url crear cepaxmedio
            				elevacionesSelect();
							console.log(data);
							$(document).ajaxStop(function(){
								$('#select_elevacion').val(data.id).trigger('change.select2');
							});
								
						}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarElevacion").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalElevacion").modal('hide');//cierra el modal
	});

	$('#modalElevacion').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$("input[name='id_elevacion']").val("");	
	});


});

function listarElevaciones(){//metodo de listar la caracteristica determinada
	$("#tableElevacion tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableElevacion').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('elevacion.dataelevacion').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"elevacion"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"

    }
    ],
    
	});
	
	actualizarElevacion("#tableElevacion tbody",table);
	eliminarElevacion("#tableElevacion tbody",table);
	
}

function printErrorMsgElevacion (msg) {
			//$(".print-error-msg").find("ul").html('');
			//$(".print-error-msg").css('display','block');
			var errores="";
			$.each( msg, function( key, value ) {
			//	$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
				errores=errores+"\n"+value;
				
			});
			swal("Error", errores, "error");
}

function printSuccessMsgElevacion (msg) {
	//$(".print-success-msg").fadeIn();
	$("#modalElevacion").modal('hide');
	//$(".print-error-msg").fadeOut();
	//$(".print-success-msg").fadeOut(3000);
	listarElevaciones();
	swal("Excelente!", msg, "success");;
}


function actualizarElevacion(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		$("input[name='elevacion']").val(data.elevacion);
		$("input[name='id_elevacion']").val(data.id);
		$("#modalElevacion").modal('show');
	});
}

function eliminarElevacion(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar la elevación: '+data.elevacion+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarElevacionAjax(data.id);
		   
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarElevacionAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('elevacion.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarElevaciones();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************FORMAS***************************************************/

$(document).ready(function() {
	listarFormas();//funcion que lista en el datatable las superficies
	
	$("#añadirForma").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var forma = $("input[name='forma']").val();//obtengo la caracteristica del formulario
	    	var id = $("input[name='id_forma']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url:  route('forma.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, forma:forma, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"forma");
	                	var pathname = window.location.pathname;
	                	var array=pathname.split("/");
						if(array[array.length-1]=="crear"){//valido que se encuentre en la url crear cepaxmedio
            				formasSelect();
							console.log(data);
							$(document).ajaxStop(function(){
								$('#select_forma').val(data.id).trigger('change.select2');
							});
								
						}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarForma").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalForma").modal('hide');//cierra el modal
	});

	$('#modalForma').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$("input[name='id_forma']").val("");
	});


});

function listarFormas(){//metodo de listar la caracteristica determinada
	$("#tableForma tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableForma').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('forma.dataforma').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"forma"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"

    }
    ],
    
	});
	
	actualizarForma("#tableForma tbody",table);
	eliminarForma("#tableForma tbody",table);
	
}

function printErrorMsgForma (msg) {
			//$(".print-error-msg").find("ul").html('');
			//$(".print-error-msg").css('display','block');
			var errores="";
			$.each( msg, function( key, value ) {
			//	$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
				errores=errores+"\n"+value;
				
			});
			swal("Error", errores, "error");
}

function printSuccessMsgForma (msg) {
	//$(".print-success-msg").fadeIn();
	$("#modalForma").modal('hide');
	//$(".print-error-msg").fadeOut();
	//$(".print-success-msg").fadeOut(3000);
	listarFormas();
	swal("Excelente!", msg, "success");
}


function actualizarForma(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		$("input[name='forma']").val(data.forma);
		$("input[name='id_forma']").val(data.id);
		$("#modalForma").modal('show');
	});
}

function eliminarForma(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar la forma: '+data.forma+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarFormaAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarFormaAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('forma.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarFormas();
	               		swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************SUPERFICIES***************************************************/

$(document).ready(function() {
	listarSuperficies();//funcion que lista en el datatable las superficies
	
	$("#añadirSuperficie").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var superficie = $("input[name='superficie']").val();//obtengo la caracteristica del formulario
	    	var id = $("input[name='id_superficie']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url:  route('superficie.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, superficie:superficie, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"superficie");
	                	var pathname = window.location.pathname;
	                	var array=pathname.split("/");
						if(array[array.length-1]=="crear"){//valido que se encuentre en la url crear cepaxmedio
            				superficiesSelect();
							console.log(data);
							$(document).ajaxStop(function(){
								$('#select_superficie').val(data.id).trigger('change.select2');
							});
								
						}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarSuperficie").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalSuperficie").modal('hide');//cierra el modal
	});

	$('#modalSuperficie').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$("input[name='id_superficie']").val("");
	});


});

function listarSuperficies(){//metodo de listar la caracteristica determinada
	$("#tableSuperficie tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableSuperficie').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('superficie.datasuperficie').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"superficie"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"

    }
    ],
    
	});
	
	actualizarSuperficie("#tableSuperficie tbody",table);
	eliminarSuperficie("#tableSuperficie tbody",table);
	
}

function printErrorMsgSuperficie (msg) {
			//$(".print-error-msg").find("ul").html('');
			//$(".print-error-msg").css('display','block');
			var errores="";
			$.each( msg, function( key, value ) {
			//	$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
				errores=errores+"\n"+value;
				
			});
			swal("Error", errores, "error");
}

function printSuccessMsgSuperficie (msg) {
	//$(".print-success-msg").fadeIn();
	$("#modalSuperficie").modal('hide');
	//$(".print-error-msg").fadeOut();
	//$(".print-success-msg").fadeOut(3000);
	listarSuperficies();
	swal("Excelente!", msg, "success");
}


function actualizarSuperficie(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		$("input[name='superficie']").val(data.superficie);
		$("input[name='id_superficie']").val(data.id);
		$("#modalSuperficie").modal('show');
	});
}

function eliminarSuperficie(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar la superficie: '+data.superficie+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarSuperficieAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarSuperficieAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('superficie.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarSuperficies();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************GENEROS***************************************************/

$(document).ready(function() {
	listarGeneros();//funcion que lista en el datatable las superficies
	
	$("#añadirGenero").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var genero = $("input[name='genero']").val();//obtengo la caracteristica del formulario
	    	var id = $("input[name='id_idgenero']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url:  route('genero.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, genero:genero, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	 	             	printSuccessMsg(data.success,"genero");
	                	var pathname = window.location.pathname;
	                	if(pathname.includes("cepa") && (pathname.includes("create") || pathname.includes("edit")) && !pathname.includes("medios_selectivos")){
							generosSelect();
							$(document).ajaxStop(function(){
								$('#select_genero').val(data.id).trigger('change.select2');
								$('#select_genero2').val(data.id).trigger('change.select2');
							});
						}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarGenero").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalGenero").modal('hide');//cierra el modal
	});

	$('#modalGenero').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input no ocultos, textareas, select.
	$("input[name='id_idgenero']").val("");
	});


});

function listarGeneros(){//metodo de listar la caracteristica determinada
	$("#tableGenero tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableGenero').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('genero.datagenero').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"genero"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"

                    
    }
    ],
    
	});
	
	actualizarGenero("#tableGenero tbody",table);
	eliminarGenero("#tableGenero tbody",table);
	
}

function printErrorMsgGenero (msg) {
			//$(".print-error-msg").find("ul").html('');
			//$(".print-error-msg").css('display','block');
			var errores="";
			$.each( msg, function( key, value ) {
			//	$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
				errores=errores+"\n"+value;
				
			});
			swal("Error", errores, "error");
}

function printSuccessMsgGenero (msg) {
	//$(".print-success-msg").fadeIn();
	$("#modalGenero").modal('hide');
	//$(".print-error-msg").fadeOut();
	//$(".print-success-msg").fadeOut(3000);
	listarGeneros();
	generosSelect();
	swal("Excelente!", msg, "success");
}


function actualizarGenero(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		$("input[name='genero']").val(data.genero);
		$("input[name='id_idgenero']").val(data.id);
		$("#modalGenero").modal('show');
	});
}

function eliminarGenero(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar el género: '+data.genero+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarGeneroAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarGeneroAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('genero.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarGeneros();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************ESPECIE***************************************************/

$(document).ready(function() {
	listarEspecies();//funcion que lista en el datatable los bordes
	var pathname = window.location.pathname;
		
	if(pathname=="/caracteristicas"){
		generosSelect();
		$("#select_genero").css('width','100%');//mantiene el width del select2 dentro del modal
		$("#select_genero").select2({
			  language: "es"
		});
	}
	$.fn.modal.Constructor.prototype.enforceFocus = function() {};

	
	$("#añadirEspecie").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var especie = $("input[name='especie']").val();//obtengo la caracteristica del formulario
	    	var id_genero =$("#select_genero").val();//obtengo el id del genero seleccionado del formulario
	    	var id = $("input[name='id_especie']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url:  route('especie.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, especie:especie,id_genero:id_genero, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"especie");
	                	var pathname = window.location.pathname;
							if(pathname.includes("cepa") && (pathname.includes("create") || pathname.includes("edit")) && !pathname.includes("medios_selectivos")){
									especiesSelect();
									$(document).ajaxStop(function(){
										$('#select_especie').val(data.id).trigger('change.select2');
									});
							}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarEspecie").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalEspecie").modal('hide');//cierra el modal
	});

	$('#modalEspecie').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
		$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	 	var pathname = window.location.pathname;
		if(pathname!="/cepa/create"){
	 		$('#select_genero').val('').trigger('change.select2');//deja la posicion del select2 a la inicial
		}
		$("input[name='id_especie']").val("");
	});
});

function generosSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
        document.getElementById("select_genero").options.length=1;
        var pathname = window.location.pathname;
		
		if(pathname.includes("cepa") && (pathname.includes("create") || pathname.includes("edit")) && !pathname.includes("medios_selectivos")){
         document.getElementById("select_genero2").options.length=1;
     	}
		$.ajax({//peticion ajax
	            url: route('genero.generos').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
								document.getElementById("select_genero").options[document.getElementById("select_genero").options.length]=new Option(value.genero, value.id);
								var pathname = window.location.pathname;
		
								if(pathname.includes("cepa") && (pathname.includes("create") || pathname.includes("edit")) && !pathname.includes("medios_selectivos")){
								document.getElementById("select_genero2").options[document.getElementById("select_genero2").options.length]=new Option(value.genero, value.id);
								}
					});
	            }
	        });
}

function listarEspecies(){//metodo de listar la caracteristica determinada
	$("#tableEspecie tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableEspecie').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('especie.dataespecie').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"especie"},
    {"data":"genero"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"

    }
    ],
    
	});
	
	actualizarEspecie("#tableEspecie tbody",table);
	eliminarEspecie("#tableEspecie tbody",table);
	
}

function printErrorMsgEspecie (msg) {
			try{
				//$(".print-error-msg").find("ul").html('');
				//$(".print-error-msg").css('display','block');
				var errores="";
				$.each( msg, function( key, value ) {
				//	$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
					errores=errores+"\n"+value;
					
				});
				swal("Error", errores, "error");
			}catch(error){
				swal("Error", msg, "error");
			}
}

function printSuccessMsgEspecie (msg) {
	//$(".print-success-msg").fadeIn();
	$("#modalEspecie").modal('hide');
	//$(".print-error-msg").fadeOut();
	//$(".print-success-msg").fadeOut(3000);
	listarEspecies();
	swal("Excelente!", msg, "success");
}


function actualizarEspecie(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		console.log(data);
		$("input[name='especie']").val(data.especie);
		$("input[name='id_especie']").val(data.id);
		$('#select_genero').val(data.id_genero).trigger('change.select2');
		$("#modalEspecie").modal('show');
	});
}

function eliminarEspecie(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar la especie: '+data.especie+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarEspecieAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarEspecieAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	           	url:  route('especie.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarEspecies();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************GRUPO MICROBIANO***************************************************/
$(document).ready(function() {
	listarGrupos();//funcion que lista en el datatable los bordes
	
	$("#añadirGrupoMicrobiano").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var grupo_microbiano = $("input[name='grupo_microbiano']").val();//obtengo la caracteristica del formulario
	    	var id = $("input[name='id_grupomicrobiano']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url:  route('grupomicrobiano.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, grupo_microbiano:grupo_microbiano, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"grupo");
	                	var pathname = window.location.pathname;
							if(pathname.includes("cepa") && (pathname.includes("create") || pathname.includes("edit")) && !pathname.includes("medios_selectivos")){
									gruposSelect();
									$(document).ajaxStop(function(){
										$('#select_grupo').val(data.id).trigger('change.select2');
									});
							}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarGrupoMicrobiano").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalGrupoMicrobiano").modal('hide');//cierra el modal
	});

	$('#modalGrupoMicrobiano').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$("input[name='id_grupomicrobiano']").val("");
	});


});

function listarGrupos(){//metodo de listar la caracteristica determinada
	$("#tableGrupoMicrobiano tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableGrupoMicrobiano').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":  menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('grupomicrobiano.datagrupomicrobiano').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"grupo_microbiano"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"

    }
    ],
    
	});
	
	actualizarGrupoMicrobiano("#tableGrupoMicrobiano tbody",table);
	eliminarGrupoMicrobiano("#tableGrupoMicrobiano tbody",table);
	
}



function actualizarGrupoMicrobiano(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		$("input[name='grupo_microbiano']").val(data.grupo_microbiano);
		$("input[name='id_grupomicrobiano']").val(data.id);
		$("#modalGrupoMicrobiano").modal('show');
	});
}

function eliminarGrupoMicrobiano(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar el grupo microbiano: '+data.grupo_microbiano+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarGrupoMicrobianoAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarGrupoMicrobianoAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('grupomicrobiano.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarGrupos();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************ORIGEN***************************************************/
$(document).ready(function() {
	listarOrigenes();//funcion que lista en el datatable los bordes
	
	$("#añadirOrigen").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var origen = $("input[name='origen']").val();//obtengo la caracteristica del formulario
	    	var id = $("input[name='id_origen']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url:  route('origen.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, origen:origen, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"origen");
	                	var pathname = window.location.pathname;
							if(pathname.includes("cepa") && (pathname.includes("create") || pathname.includes("edit")) && !pathname.includes("medios_selectivos")){
									origenesSelect();
									console.log(data);
									$(document).ajaxStop(function(){
										$('#select_origen').val(data.id).trigger('change.select2');
									});
									
							}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarOrigen").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalOrigen").modal('hide');//cierra el modal
	});

	$('#modalOrigen').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$("input[name='id_origen']").val("");
	});


});

function listarOrigenes(){//metodo de listar la caracteristica determinada
	$("#tableOrigen tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	var table=$('#tableOrigen').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":  menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('origen.dataorigen').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"origen"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"

    }
    ],
    
	});
	
	
	actualizarOrigen("#tableOrigen tbody",table);
	eliminarOrigen("#tableOrigen tbody",table);
	
}


function actualizarOrigen(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		$("input[name='origen']").val(data.origen);
		$("input[name='id_origen']").val(data.id);
		$("#modalOrigen").modal('show');
	});
}

function eliminarOrigen(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar el origen: '+data.origen+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarOrigenAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarOrigenAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('origen.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarOrigenes();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************MEDIO***************************************************/
$(document).ready(function() {
	listarMedios();//funcion que lista en el datatable los bordes
	
	$("#añadirMedio").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var medio = $("input[name='medio']").val();//obtengo la caracteristica del formulario
	    	var id = $("input[name='id_medio']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url:  route('medio.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, medio:medio, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"medio");
	                	var pathname = window.location.pathname;
	                	var array=pathname.split("/");
						if(array[array.length-1]=="crear"){//valido que se encuentre en la url crear cepaxmedio
            				mediosSelect();
							console.log(data);
							$(document).ajaxStop(function(){
								$('#select_medio').val(data.id).trigger('change.select2');
							});
								
						}
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });


	    }); 


	$("#cancelarMedio").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalMedio").modal('hide');//cierra el modal
	});

	$('#modalMedio').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$("input[name='id_medio']").val("");
	});


});

function listarMedios(){//metodo de listar la caracteristica determinada
	$("#tableMedio tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableMedio').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":  menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('medio.datamedio').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"medio"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"
    
    }
    ],
    
	});
	
	actualizarMedio("#tableMedio tbody",table);
	eliminarMedio("#tableMedio tbody",table);
	
}

function actualizarMedio(tbody, table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		$("input[name='medio']").val(data.medio);
		$("input[name='id_medio']").val(data.id);
		$("#modalMedio").modal('show');
	});
}

function eliminarMedio(tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar el medio: '+data.medio+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarMedioAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarMedioAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('medio.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarMedios();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************************************************************/

/*************************************INVESTIGADOR***************************************************/
$(document).ready(function() {
	
	listarInvestigadores();

	$('#form_investigador').submit(function ( e ) {
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url:  route('investigadores.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	$("#modalInvestigador").modal('hide');
	                	swal('Excelente!', data.success, 'success')
	                	.then(function() {
	                		location.reload(true);//recarga la pagina
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
    e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
});

	$("#input_imagen_investigador").change(function(e) {
	    var data = new FormData(this); //Creamos los datos a enviar con el formulario
	    

	    var inputFileImage = $(this)[0];
	    console.log($("#input_imagen_investigador")[0]);
		var file = inputFileImage.files[0];
		
		
		data.append('imagen',file);
		data.append("_token", $("#token").val());
	    console.log(data);
	    $.ajax({//peticion ajax
		            url: route('investigador.validar_imagen').url(),//url del controller que guarda la peticion
		            type:'POST',
		             data: data,
		             processData: false, //Evitamos que JQuery procese los datos, daría error
	        		contentType: false, //No especificamos ningún tipo de dato
	        
		             success: function(data) {
		                if($.isEmptyObject(data.error)){
		                }else{
							swal("Error", data.error, "error");
							document.getElementById("input_imagen_investigador").value="";
							$("#remove").click();
		                }
		            }
		        });
	});
	

	


	$("#cancelarInvestigador").click(function(e){//cuando da click en el boton cancelar del modal
		$("#modalInvestigador").modal('hide');//cierra el modal
	});

	$('#modalInvestigador').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$("input[name='id_investigador']").val("");
	});

	$(".editarInvestigador").click(function(e){//cuando da click en el boton cancelar del modal
		var data=($(this).siblings('div')).data();
		$("input[name='id_investigador']").val(data.id);
		$("input[name='nombres']").val(data.nombres);
		$("input[name='apellidos']").val(data.apellidos);
		$("input[name='codigo']").val(data.codigo);
		$("input[name='email']").val(data.email);
		$("input[name='url_cvlac']").val(data.url_cvlac);
		$("#modalInvestigador").modal('show');
		var imagen=document.getElementById('imagen2');
		imagen.setAttribute("src",data.imagen); 
		console.log(imagen);
	});
	$(".eliminarInvestigador").click(function(e){//cuando da click en el boton cancelar del modal
		var data=($(this).siblings('div')).data();
		swal({
		  text: 'Desea eliminar a: '+data.nombres+" "+ data.apellidos+ ' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {
		  if (result) {
		  	
		  	eliminarInvestigadorAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});

});



function eliminarInvestigadorAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	           	url:  route('investigador.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	
	                	swal('Eliminado!', data.success, 'success')
	                	.then(function() {
	                		location.reload(true);//recarga la pagina
	                	});
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}


function listarInvestigadores(){//metodo de listar la caracteristica determinada
	$("#tableInvestigador tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableInvestigador').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('investigador.datainvestigador').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"nombres"},
    {"data":"apellidos"},
    {"data":"codigo"},
    {"data":"email"},
    {"data":"url_cvlac"},
    {"defaultContent":"<button type='button' class='btn btn-warning btn-simple editar' rel='tooltip' data-placement='top' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='btn btn-danger btn-simple eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>close</i><div class='ripple-container'></div></button>"
                   
    }
    ],
    
	});
	
	actualizarInvestigadorT("#tableInvestigador tbody",table);
	eliminarInvestigadorT("#tableInvestigador tbody",table);
	
}

function actualizarInvestigadorT(tbody,table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		$("input[name='id_investigador']").val(data.id);
		$("input[name='nombres']").val(data.nombres);
		$("input[name='apellidos']").val(data.apellidos);
		$("input[name='codigo']").val(data.codigo);
		$("input[name='email']").val(data.email);
		$("input[name='url_cvlac']").val(data.url_cvlac);
		$("#modalInvestigador").modal('show');
		var imagen=document.getElementById('imagen2');
		imagen.setAttribute("src",data.imagen); 
	});
}

function eliminarInvestigadorT(tbody,table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar el investigador '+data.nombres +' '+ data.apellidos +' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {

		  if (result) {
		  	
		  	eliminarInvestigadorTAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarInvestigadorTAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('investigador.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarInvestigadores();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}


/****************************************************************************************/

/****************************************************CEPAS***************************************/
$(document).ready(function() {

	listarCepas();
	var pathname = window.location.pathname;
	var array=pathname.split("/");
	if(pathname.includes("cepa") && (pathname.includes("create") || pathname.includes("edit")) && !pathname.includes("medios_selectivos")){
		  $('#select_genero, #select_genero2, #select_especie, #select_grupo, #select_origen, #select_estadocepa').css('width','100%');//mantiene el width del select2 dentro del modal
		  $('#select_genero, #select_genero2, #select_especie, #select_grupo, #select_origen, #select_estadocepa').select2({
		        language: "es"
		    });

		  $("#select_genero").select2({
		        language: "es"
		    });


		   demo.initMaterialWizard();
		        setTimeout(function() {
		            $('.card.wizard-card').addClass('active');
		        }, 600);
		

		$("#select_genero2").change(function(){
			 var id_genero =$("#select_genero2").val();//obtengo el genero seleccionado
	 		$('#select_genero').val(id_genero).trigger('change.select2');//actualizo el select del modal de especie
        });
		
		$("#select_genero").prop("disabled", true);//desahibilita el select del modal de especie para no poder cambiar el genero seleccionado anteriormente y generar inconsistencias

		
	}

	if(pathname.includes("cepa") && pathname.includes("create") && !pathname.includes("medios_selectivos")){
		generosSelect();
		//especiesSelect();
		gruposSelect();
		origenesSelect();
	}


	$('#form_cepa').submit(function ( e ) {
     e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
	if($('#publicado').is(':checked')){
		publicado=1;
	}else{
		publicado=0;
	}
	data.append('publicado',publicado);
    console.log(data);
    $.ajax({//peticion ajax
	           url:  route('cepa.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href=route('cepa.index').url();
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
   
	});

	$('#form_editarCepa').submit(function ( e ) {
     e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    if($('#publicado').is(':checked')){
		publicado=1;
	}else{
		publicado=0;
	}
	data.append('publicado',publicado);
    console.log(data);
    $.ajax({//peticion ajax
	            url: route('cepa.actualizar').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href=route('cepa.index').url();
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
   
	});

	$("#eliminarCepa").click(function(){
		var id_cepa=$("#info_id_cepa").val();
		var codigo_cepa=document.getElementById('info_codigo_cepa').innerHTML;
		mensajeEliminarCepa(id_cepa,codigo_cepa)

	})

	$("#editarCepa").click(function(){
		var id_cepa=$("#info_id_cepa").val();
		location.href="cepa/"+id_cepa+"/edit";
	})

	

	

	

});

function listarCepas(){//metodo de listar la caracteristica determinada
	
	var table = $('#tableCepa').DataTable( {
		"destroy":true,//esto permite reinicializar el datatable varias veces
		"language": {
	            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	        },
	    "lengthMenu":     menuDatatable,
        "ajax": route('cepa.datacepa').url(),
        "columns": [
            {
                "className":      'details-control',
                "data":           null,

                "defaultContent": ''
            },
            { "data": "codigo" },
            { "data": "estado" },
            { "data": "genero" },
            { "data": "especie" },
            { "data": "grupo_microbiano" },
            { "data": "origen" },            
        ]
    } );
	
	editarCepa("#tableCepa tbody",table);
	ampliarCepa("#tableCepa tbody",table);
	publicarCepa("#tableCepa tbody",table);
	eliminarCepa("#tableCepa tbody",table);
	CepaMediosSelectivos("#tableCepa tbody",table);
	CepaCaracteristicasMicroscopicas("#tableCepa tbody",table);
	CepaCaracteristicasBioquimicas("#tableCepa tbody",table);
	CepaIdentificacionMolecular("#tableCepa tbody",table);
	CaracterizacionFisiologica("#tableCepa tbody",table);
	CepaMetodosConservacion("#tableCepa tbody",table);
	infoCepa("#tableCepa tbody",table);
	}


function infoCepa(tbody,table){
	$(tbody).on("click", "button.info", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();
		document.getElementById('info_codigo_cepa').innerText = data.codigo;
		document.getElementById('info_genero_cepa').innerText = data.genero;
		document.getElementById('info_especie_cepa').innerText = data.especie;
		document.getElementById('info_grupomicrobiano_cepa').innerText = data.grupo_microbiano;
		document.getElementById('info_origen_cepa').innerText = data.origen;
		document.getElementById('info_morfologia_cepa').innerText = data.morfologia;
		document.getElementById('info_tinciongram_cepa').innerText = data.tincion_gram;
		document.getElementById('info_motilidad_cepa').innerText = data.motilidad;
		document.getElementById('info_id_cepa').value = data.id;

	});
	
}

function ampliarCepa(tbody,table){
	$(tbody).on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( formatCepa(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
}

function formatCepa ( d ) {
    // `d` is the original data object for the row
    var cb=null;
    if(d.publicado==0){
    	cb='<input class="check" type="checkbox">';
    }else{
    	cb='<input class="check" type="checkbox" checked>';
    }
    return "<table cellpadding='25' cellspacing='0' border='0' style='padding-left:250px;'>"+
        "<tr>"+
		  "<td><strong>Morfologia:</strong>" +d.morfologia+"</td>"+
		  "<td><strong> Tinción Gram:</strong>"+d.tincion_gram+"</td>"+
		  "<td><strong> Motilidad: </strong>"+d.motilidad+"</td>"+
		  "<td><strong>Publicado:</strong> "+cb+"</td>"+
		"</tr>"+
        "<tr>"+
            "<td colspan='10'>"+
            	"<button type='button' class='info btn btn-info btn-simple' data-toggle='modal' data-target='#modalInfoCepa' rel='tooltip' data-placement='bottom' title='Ver'><i class='material-icons'>zoom_in</i><div class='ripple-container'></div></button>"+
            	"<button type='button' class='editar btn btn-warning btn-simple' rel='tooltip' data-placement='bottom' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button>"+
            	"<button type='button' class='eliminar btn btn-danger btn-simple' rel='tooltip' data-placement='bottom' title='Eliminar'><i class='material-icons'>close</i></button>"+
            	"<button type='button' id='medios_selectivos' class='medios_selectivos btn btn-default btn-simple' rel='tooltip' data-placement='bottom' title='Medios Selectivos'><i class='material-icons'>group_work</i><div class='ripple-container'></div></button>"+
            	"<button type='button' id='caracteristicas_microscopicas' class='caracteristicas_microscopicas btn btn-default btn-simple' rel='tooltip' data-placement='bottom' title='Características Microscópicas'><i class='material-icons'>blur_on</i><div class='ripple-container'></div></button>"+
            	"<button type='button' id='caracteristicas_bioquimicas' class='caracteristicas_bioquimicas btn btn-default btn-simple' rel='tooltip' data-placement='bottom' title='Características Bioquímicas'><i class='material-icons'>gradient</i><div class='ripple-container'></div></button>"+
            	"<button type='button' id='caracterizacion_fisiologica' class='caracterizacion_fisiologica btn btn-default btn-simple' rel='tooltip' data-placement='bottom' title='Caracterización Fisiológica'><i class='material-icons'>assignment</i><div class='ripple-container'></div></button>"+
            	"<button type='button' id='identificacion_molecular' class='identificacion_molecular btn btn-default btn-simple' rel='tooltip' data-placement='bottom' title='Identificación Molecular'><i class='material-icons'>find_in_page</i><div class='ripple-container'></div></button>"+
            	"<button type='button' id='metodos_conservacion' class='metodos_conservacion btn btn-default btn-simple' rel='tooltip' data-placement='bottom' title='Métodos Conservación'><i class='material-icons'>layers</i><div class='ripple-container'></div></button>"+
            "</td>"+
        "</tr>"+
    "</table>";
}

function publicarCepa(tbody,table){
	$(tbody).on("click", "input.check", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		var _token = $('meta[name="csrf-token"]').attr('content');
		var estado_inicial="";
		var publicado="";
		var checkbox=$(this)[0];
		if($(this).is(':checked')){
			estado_inicial=false;
			publicado=1;
		}else{
			estado_inicial=true;
			publicado=0;
		}

		swal({
		  text: 'Desea cambiar el estado de publicación de la cepa '+data.codigo+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then(function(result){
		  if (result) {
		  	
		  	$.ajax({
	            url: route('cepa.publicar').url(),
	            type:'GET',
	            data: {_token:_token, id:data.id,publicado:publicado},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal('Excelente!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	checkbox.checked=estado_inicial;

	                	
	                }
	            }
	        });
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  
		}
		
	}, function(dismiss) {
		checkbox.checked=estado_inicial;

	});
		
	});
}

function CepaMediosSelectivos(tbody,table){
	$(tbody).on("click", "button.medios_selectivos", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		var pathname = window.location;
		location.href = pathname+"/"+data.id+"/medios_selectivos/";
	});
}

function CepaCaracteristicasMicroscopicas(tbody,table){

	$(tbody).on("click", "button.caracteristicas_microscopicas", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		

		location.href = route('caracteristicas_microscopicas.mostrar', {id:data.id}).url();
	});
}

function CepaCaracteristicasBioquimicas(tbody,table){

	$(tbody).on("click", "button.caracteristicas_bioquimicas", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		

		location.href = route('caracteristicas_bioquimicas.mostrar', {id:data.id}).url();
	});
}


function CepaIdentificacionMolecular(tbody,table){
	$(tbody).on("click", "button.identificacion_molecular", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		var pathname = window.location;
		console.log($(this)[0]);
		location.href = pathname+"/"+data.id+"/identificacion_molecular/";
	});
}

function CaracterizacionFisiologica(tbody,table){
	$(tbody).on("click", "button.caracterizacion_fisiologica", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		var pathname = window.location;
		location.href = pathname+"/"+data.id+"/caracterizacion_fisiologica/";
	});
}

function CepaMetodosConservacion(tbody,table){

	$(tbody).on("click", "button.metodos_conservacion", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		

		location.href = route('metodos_conservacion.mostrar', {id:data.id}).url();
	});
}

function editarCepa(tbody,table){
	$(tbody).on("click", "button.editar", function(){
		
		//var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		var data=table.row(($(this).parents("tr")).prev("tr")).data();
		location.href="cepa/"+data.id+"/edit";
		
	});
}

function eliminarCepa(tbody,table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		mensajeEliminarCepa(data.id,data.codigo);
	});
}

function mensajeEliminarCepa(id_cepa,codigo_cepa){
	swal({
		  text: 'Desea eliminar la cepa '+codigo_cepa+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {

		  if (result) {
		  	
		  	eliminarCepaAjax(id_cepa);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
}


function eliminarCepaAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	           	url:  route('cepa.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarCepas();
	                	swal('Eliminado!', data.success, 'success').then(function() {
	                		$("#modalInfoCepa").modal('hide');
	                	});

	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

$(document).ready(function() {
	

	$( "#select_genero2" ).change(function() {
  		especiesSelect();
  		$('#select_especie').val("0").trigger('change.select2');
	});
});

function especiesSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
	        document.getElementById("select_especie").options.length=1;
	        var genero=$("#select_genero2").val();
        $.ajax({//peticion ajax
	            url: route('especie.especies').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, genero:genero},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
	                			document.getElementById("select_especie").options[document.getElementById("select_especie").options.length]=new Option(value.especie, value.id);
					});
	            }
	        });
}


function gruposSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
        document.getElementById("select_grupo").options.length=1;
		$.ajax({//peticion ajax
	            url: route('grupomicrobiano.grupos').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
								document.getElementById("select_grupo").options[document.getElementById("select_grupo").options.length]=new Option(value.grupo_microbiano, value.id);
					});
	            }
	        });
}

function origenesSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
        document.getElementById("select_origen").options.length=1;
		$.ajax({//peticion ajax
	            url: route('origen.origenes').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
								document.getElementById("select_origen").options[document.getElementById("select_origen").options.length]=new Option(value.origen, value.id);
					});
	            }
	        });
}
/******************************************************************************************/

/*********************************************CEPA X MEDIO******************************/

$(document).ready(function() {
	
	listarCepaXMedios();
	var pathname = window.location.pathname;
	if(pathname.includes("cepa") && (pathname.includes("crear") || pathname.includes("edit")) && pathname.includes("medios_selectivos")){//valido que se encuentre en la url crear cepaxmedio
		  $('#select_medio, #select_borde, #select_consistencia, #select_detalleoptico, #select_elevacion, #select_forma, #select_superficie').css('width','100%');//mantiene el width del select2 dentro del modal
		  $('#select_medio, #select_borde, #select_consistencia, #select_detalleoptico, #select_elevacion, #select_forma, #select_superficie').select2({
		        language: "es"
		    });

		if(pathname.includes("crear")){
			bordesSelect();
			consistenciasSelect();
			detallesopticosSelect();
			elevacionesSelect();
			formasSelect();
			superficiesSelect();
			mediosSelect();

		}

	  	


	}



	$('#form_cepaxmedio').submit(function ( e ) {
     e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url:  route('cepaxmedio.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href="admin/cepa/"+data.id_cepa+"/medios_selectivos";
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
   
	});

	$('#form_editarCepaXMedio').submit(function ( e ) {
     e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url: route('medios_selectivos.actualizar').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href="/cepa/"+data.id_cepa+"/medios_selectivos";
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
   
	});

	$(".eliminarCepa").click(function(){
		swal("Excelente!", "Clickeo", "success")
		.then(function() {
			// Redirect the user
			location.reload(true);//recarga la pagina
			});
	})

	

});

function listarCepaXMedios(){//metodo de listar la caracteristica determinada
	$("#tableCepaXMedios tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	var id=$("#id_cepa").val();
	var table=$('#tableCepaXMedios').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": {
    "url": route('medios_selectivos.data_medios_selectivos').url(),
    "data": {id:id, _token:_token},
    "type":"POST",
    
    },
    "columns":[
    {
                "className":      'details-control',
                "data":           null,
                "defaultContent": ''
            },
    {"data":"medio"},
    {"data":"borde"},
    {"data":"consistencia"},
    {"data":"detalle_optico"},
    {"data":"elevacion"},
    {"data":"forma"},
    {"data":"superficie"},
    /*{"defaultContent":"<button type='button' class='editar btn btn-warning btn-simple' rel='tooltip' data-placement='bottom' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='eliminar btn btn-danger btn-simple' rel='tooltip' data-placement='bottom' title='Eliminar'><i class='material-icons'>close</i></button>"
    }*/
    ],
  
	});
	ampliarCepaXMedio("#tableCepaXMedios tbody",table);
	editarCepaXMedio("#tableCepaXMedios tbody",table);
	eliminarCepaXMedio("#tableCepaXMedios tbody",table);

}

function ampliarCepaXMedio(tbody,table){
	$(tbody).on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( formatCepaXMedio(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
}

function formatCepaXMedio ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="25" cellspacing="0" border="0" style="padding-left:250px;">'+
        '<tr>'+
		  '<td><strong>Otras caracteristícas:</strong> '+d.otrasCaracteristicas+'</td>'+
		'</tr>'+
        '<tr>'+
            '<td><button type="button" class="editar btn btn-warning btn-simple" rel="tooltip" data-placement="bottom" title="Editar"><i class="material-icons">edit</i><div class="ripple-container"></div></button><button type="button" class="eliminar btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Eliminar"><i class="material-icons">close</i></button>'+
        '</tr>'+
    '</table>';
}

function editarCepaXMedio(tbody,table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		var pathname = window.location;
		console.log(data);
		location.href="/cepa/"+data.id_cepa+"/medios_selectivos/"+data.id+"/edit";
	});
}

function eliminarCepaXMedio(tbody,table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar el medio selectivo '+data.medio+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {

		  if (result) {
		  	
		  	eliminarCepaXMedioAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarCepaXMedioAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('medios_selectivos.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarCepaXMedios();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}




function mediosSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
	        document.getElementById("select_medio").options.length=1;
        $.ajax({//peticion ajax
	            url: route('medio.medios').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
	                			document.getElementById("select_medio").options[document.getElementById("select_medio").options.length]=new Option(value.medio, value.id);
					});
	            }
	        });
}

function bordesSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
	        document.getElementById("select_borde").options.length=1;
        $.ajax({//peticion ajax
	            url: route('borde.bordes').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
	                			document.getElementById("select_borde").options[document.getElementById("select_borde").options.length]=new Option(value.borde, value.id);
					});
	            }
	        });
}

function consistenciasSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
	        document.getElementById("select_consistencia").options.length=1;
        $.ajax({//peticion ajax
	            url: route('consistencia.consistencias').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
	                			document.getElementById("select_consistencia").options[document.getElementById("select_consistencia").options.length]=new Option(value.consistencia, value.id);
					});
	            }
	        });
}

function detallesopticosSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
	        document.getElementById("select_detalleoptico").options.length=1;
        $.ajax({//peticion ajax
	            url: route('detalleoptico.detalles').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
	                			document.getElementById("select_detalleoptico").options[document.getElementById("select_detalleoptico").options.length]=new Option(value.detalle_optico, value.id);
					});
	            }
	        });
}

function elevacionesSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
	        document.getElementById("select_elevacion").options.length=1;
        $.ajax({//peticion ajax
	            url: route('elevacion.elevaciones').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
	                			document.getElementById("select_elevacion").options[document.getElementById("select_elevacion").options.length]=new Option(value.elevacion, value.id);
					});
	            }
	        });
}

function formasSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
	        document.getElementById("select_forma").options.length=1;
        $.ajax({//peticion ajax
	            url: route('forma.formas').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
	                			document.getElementById("select_forma").options[document.getElementById("select_forma").options.length]=new Option(value.forma, value.id);
					});
	            }
	        });
}

function superficiesSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
	        document.getElementById("select_superficie").options.length=1;
        $.ajax({//peticion ajax
	            url: route('superficie.superficies').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
	                			document.getElementById("select_superficie").options[document.getElementById("select_superficie").options.length]=new Option(value.superficie, value.id);
					});
	            }
	        });
}

/*******************************************************************************************/

/************************************Identificacion Molecular*******************************/
$(document).ready(function() {
	$('#form_identificacionmolecular').submit(function ( e ) {
	     e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
	    var data = new FormData(this); //Creamos los datos a enviar con el formulario
	    console.log(data);
	    $.ajax({//peticion ajax
		            url:  route('identificacion_molecular.store').url(),//url del controller que guarda la peticion
		            type:'POST',
		             data: data,
		             processData: false, //Evitamos que JQuery procese los datos, daría error
	        		contentType: false, //No especificamos ningún tipo de dato
	        
		             success: function(data) {
		                if($.isEmptyObject(data.error)){
		                	swal("Excelente!", data.success, "success").then(function() {
		                		location.href=route('cepa.index').url();
		                	});
		                }else{
							printErrorMsg(data.error);
		                }
		            }
		        });
	 
	   
		});
});

/***********************************************************************************************/

/*********************************************CARACTERIZACION FISIOLOGICA******************************/

$(document).ready(function() {
	
	listarCaracterizacionFisiologica();
	
	$('#form_caracterizacionfisiologica').submit(function ( e ) {
     e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url:  route('caracterizacion_fisiologica.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href="/cepa/"+data.id_cepa+"/caracterizacion_fisiologica";
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
   
	});

	$('#form_editarCaracterizacionFisiologica').submit(function ( e ) {
     e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url: route('caracterizacion_fisiologica.actualizar').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href="/cepa/"+data.id_cepa+"/caracterizacion_fisiologica";
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
   
	});

	$(".eliminarCepa").click(function(){
		swal("Excelente!", "Clickeo", "success")
		.then(function() {
			// Redirect the user
			location.reload(true);//recarga la pagina
			});
	})

	

});

function listarCaracterizacionFisiologica(){//metodo de listar la caracteristica determinada
	$("#tableCaracterizacionFisiologica tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	var id=$("#id_cepa").val();
	var table=$('#tableCaracterizacionFisiologica').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": {
    "url": route('caracterizacion_fisiologica.data_caracterizaciones').url(),
    "data": {id:id, _token:_token},
    "type":"POST",
    
    },
    "columns":[
    {"data":"fecha"},
    {"data":"acido_indolacetico"},
    {"data":"solubilizacion_fosfatos"},
    {"data":"produccion_sideroforos"},
    {"data":"fijacion_nitrogeno"},
    {"data":"acido_salicilico"},
    {"data":"actividad_enzimatica"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning btn-simple' rel='tooltip' data-placement='bottom' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='eliminar btn btn-danger btn-simple' rel='tooltip' data-placement='bottom' title='Eliminar'><i class='material-icons'>close</i></button>"
    }
    ],
  
	});
	
	editarCaracterizacionFisiologica("#tableCaracterizacionFisiologica tbody",table);
	eliminarCaracterizacionFisiologica("#tableCaracterizacionFisiologica tbody",table);

}

function editarCaracterizacionFisiologica(tbody,table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		var pathname = window.location;
		console.log(data);
		location.href="/cepa/"+data.id_cepa+"/caracterizacion_fisiologica/"+data.id+"/edit";
	});
}

function eliminarCaracterizacionFisiologica(tbody,table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar la caracterización fisiologica seleccionada ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {

		  if (result) {
		  	
		  	eliminarCaracterizacionAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarCaracterizacionAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('caracterizacion_fisiologica.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarCaracterizacionFisiologica();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}


/*******************************************************************************************/
/*******************************PROYECTOS***************************************************/
$(document).ready(function() {

	listarProyectos();
	var pathname = window.location.pathname;
	if(pathname.includes("proyectos") && (pathname.includes("create") || pathname.includes("edit"))){//valido que se encuentre en la url crear cepaxmedio
		 $('#select_cepa, #select_estadoproyecto').css('width','70%');//mantiene el width del select2 dentro del formulario
		$('#select_cepa, #select_estadoproyecto').select2({
		  	language: "es"
		  });
		if(pathname.includes("create")){
			cepasSelect();
		}
	}

	$('#form_proyecto').submit(function ( e ) {
		e.preventDefault();
    var i=0;
     var cepas=null;
     var select = $("#select_cepa").select2('data');
     while(i<select.length){
     	if(cepas==null){
     		cepas=select[i].text;
     	}else{
     		cepas=cepas+","+select[i].text;
     	}
     	
     	i++;
     }
     $("input[name='cepas_asociadas']").val(cepas);
     console.log(cepas);
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    if($('#publicado').is(':checked')){
		publicado=1;
	}else{
		publicado=0;
	}
	data.append('publicado',publicado);
    console.log(data);

    $.ajax({//peticion ajax
	            url:  route('proyectos.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href=route('proyectos.index').url();
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
    
    
 
   
	});

$('#form_editarProyecto').submit(function ( e ) {
		e.preventDefault();
    var i=0;
     var cepas=null;
     var select = $("#select_cepa").select2('data');
     while(i<select.length){
     	if(cepas==null){
     		cepas=select[i].text;
     	}else{
     		cepas=cepas+","+select[i].text;
     	}
     	
     	i++;
     }
     $("input[name='cepas_asociadas']").val(cepas);
     console.log(cepas);
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    if($('#publicado').is(':checked')){
		publicado=1;
	}else{
		publicado=0;
	}
	data.append('publicado',publicado);
    console.log(data);
    $.ajax({//peticion ajax
	            url: route('proyectos.actualizar').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href=route('proyectos.index').url();
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
    
    
 
   
	});

})

function cepasSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
	        document.getElementById("select_cepa").options.length=0;
        $.ajax({//peticion ajax
	            url: route('cepa.cepas').url(),//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
	                			document.getElementById("select_cepa").options[document.getElementById("select_cepa").options.length]=new Option(value.codigo, value.id);
					});
	            }
	        });
}




function listarProyectos(){//metodo de listar la caracteristica determinada
	var table = $('#tableProyecto').DataTable( {
		"destroy":true,//esto permite reinicializar el datatable varias veces
		"language": {
	            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	        },
	    "lengthMenu":     menuDatatable,
        "ajax": route('proyectos.dataproyectos').url(),//url que hace la busqueda sql de la informacion
        "columns": [
            {
                "className":      'details-control',
                "data":           null,
                "defaultContent": ''
            },
            {"data":"nombre_proyecto"},
            {"data":"estado"},
		    {"data":"cepas_asociadas"},
		    {"data":"fecha_aislamiento"},
		    {"data":"lugar_aislamiento"},
		    {"data":"nombre_aislador"},
            
        ]
    } );
	
	editarProyecto("#tableProyecto tbody",table);
	eliminarProyecto("#tableProyecto tbody",table);
	proyectoInoculacionPlantas("#tableProyecto tbody",table);
	ampliarProyecto("#tableProyecto tbody",table);
	publicarProyecto("#tableProyecto tbody",table);

}

function ampliarProyecto(tbody,table){
	$(tbody).on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( formatProyecto(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
}

function formatProyecto ( d ) {
    // `d` is the original data object for the row
    var cb=null;
    if(d.publicado==0){
    	cb='<input class="check" type="checkbox">';
    }else{
    	cb='<input class="check" type="checkbox" checked>';
    }

    return '<table cellpadding="25" cellspacing="0" border="0" style="padding-left:250px;">'+
        '<tr>'+
            '<td><button type="button" class="editar btn btn-warning btn-simple" rel="tooltip" data-placement="bottom" title="Editar"><i class="material-icons">edit</i><div class="ripple-container"></div></button><button type="button" class="eliminar btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Eliminar"><i class="material-icons">close</i></button><button type="button" id="inoculacion_plantas" class="inoculacion_plantas btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Inoculación Plantas"><i class="material-icons">opacity</i><div class="ripple-container"></div></button></td>'+
        	'<td><strong>Publicado:</strong> '+cb+'</td>'+
        '</tr>'+
    '</table>';
}

function publicarProyecto(tbody,table){
	$(tbody).on("click", "input.check", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		var _token = $('meta[name="csrf-token"]').attr('content');
		var estado_inicial="";
		var publicado="";
		var checkbox=$(this)[0];
		if($(this).is(':checked')){
			estado_inicial=false;
			publicado=1;
		}else{
			estado_inicial=true;
			publicado=0;
		}

		swal({
		  text: 'Desea cambiar el estado de publicación del proyecto '+data.nombre_proyecto+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then(function(result){
		  if (result) {
		  	
		  	$.ajax({
	            url: route('proyectos.publicar').url(),
	            type:'GET',
	            data: {_token:_token, id:data.id,publicado:publicado},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal('Excelente!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	checkbox.checked=estado_inicial;

	                	
	                }
	            }
	        });
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  
		}
		
	}, function(dismiss) {
		checkbox.checked=estado_inicial;

	});
		
	});
}

function proyectoInoculacionPlantas(tbody,table){
	$(tbody).on("click", "button.inoculacion_plantas", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		var pathname = window.location;
		location.href = pathname+"/"+data.id+"/inoculacion_plantas/";
	});
}



function editarProyecto(tbody,table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		location.href="/proyectos/"+data.id+"/edit";
	});
}

function eliminarProyecto(tbody,table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar el proyecto "'+data.nombre_proyecto+'" ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {

		  if (result) {
		  	
		  	eliminarProyectoAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarProyectoAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('proyectos.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarProyectos();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/********************************************************************************************/

/********************************INOCULACION PLANTAS******************************************/

$(document).ready(function() {
	
	listarInoculaciones();
	



	$('#form_inoculacion').submit(function ( e ) {
     e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url:  route('inoculacion_plantas.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href="/proyectos/"+data.id_proyecto+"/inoculacion_plantas";
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
   
	});

	$('#form_editarInoculacion').submit(function ( e ) {
     e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url: route('inoculacion_plantas.actualizar').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href="/proyectos/"+data.id_proyecto+"/inoculacion_plantas";
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
   
	});

	

	

});


function listarInoculaciones(){//metodo de listar la caracteristica determinada
	$("#tableInoculacionPlantas tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	var id=$("#id_proyecto").val();
	var table=$('#tableInoculacionPlantas').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": {
    "url": route('inoculacion_plantas.data_inoculaciones').url(),
    "data": {id:id, _token:_token},
    "type":"POST",
    
    },
    "columns":[
    {
                "className":      'details-control',
                "data":           null,
                "defaultContent": ''
            },
    {"data":"fecha"},
    {"data":"cultivo"},
    {"data":"variables"},
    {"data":"rendimiento"},
     {"defaultContent":"<button type='button' class='editar btn btn-warning btn-simple' rel='tooltip' data-placement='bottom' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='eliminar btn btn-danger btn-simple' rel='tooltip' data-placement='bottom' title='Eliminar'><i class='material-icons'>close</i></button>"
    }
    ],
  
	});
	
	ampliarInoculacion("#tableInoculacionPlantas tbody",table);
	editarInoculacionPlantas("#tableInoculacionPlantas tbody",table);
	eliminarInoculacionPlantas("#tableInoculacionPlantas tbody",table);

}

function ampliarInoculacion(tbody,table){
	$(tbody).on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( formatInoculacion(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
}

function formatInoculacion ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="25" cellspacing="0" border="0" style="padding-left:250px;">'+
        '<tr>'+
		  '<td><strong>Peso Fresco Foliar (g):</strong> '+d.peso_fresco_foliar+'</td>'+
		  '<td><strong>Peso Seco Foliar (g):</strong> '+d.peso_seco_foliar+'</td>'+
		  '<td><strong>Peso Fresco Radical (g):</strong> '+d.peso_fresco_radical+'</td>'+
		  '<td><strong>Peso Seco Radical (g):</strong> '+d.peso_seco_radical+'</td>'+
		  '<td><strong>Altura Planta (cm):</strong> '+d.altura_planta+'</td>'+
		  '<td><strong>Longitud Planta (cm):</strong> '+d.longitud_planta+'</td>'+
		'</tr>'+
        '<tr>'+
            '<td colspan="6"><button type="button" class="editar btn btn-warning btn-simple" rel="tooltip" data-placement="bottom" title="Editar"><i class="material-icons">edit</i><div class="ripple-container"></div></button><button type="button" class="eliminar btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Eliminar"><i class="material-icons">close</i></button>'+
        '</tr>'+
    '</table>';
}

function editarInoculacionPlantas(tbody,table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		var pathname = window.location;
		console.log(data);
		location.href="/proyectos/"+data.id_proyecto+"/inoculacion_plantas/"+data.id+"/edit";
	});
}

function eliminarInoculacionPlantas(tbody,table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row(($(this).parents("tr")).prev("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar la inoculación seleccionada ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {

		  if (result) {
		  	
		  	eliminarInoculacionAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarInoculacionAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('inoculacion_plantas.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarInoculaciones();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}
/*******************************************************************************************/

/***********************************NOTICIA*************************************************/
$(document).ready(function() {
	
	listarNoticias();

	$('#form_noticia').submit(function ( e ) {
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	           	url:  route('noticias.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href=route('noticias.index').url();
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
    e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
	});

	$("#input_imagen_noticia").change(function(e) {
	    var data = new FormData(this); //Creamos los datos a enviar con el formulario
	    

	    var inputFileImage = $(this)[0];
	    console.log($("#input_imagen_noticia")[0]);
		var file = inputFileImage.files[0];
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
		
		data.append('imagen',file);
		data.append("_token", _token);
	    console.log(data);
	    $.ajax({//peticion ajax
		            url: route('noticias.validar_imagen').url(),//url del controller que guarda la peticion
		            type:'POST',
		             data: data,
		             processData: false, //Evitamos que JQuery procese los datos, daría error
	        		contentType: false, //No especificamos ningún tipo de dato
	        
		             success: function(data) {
		                if($.isEmptyObject(data.error)){
		                }else{
							swal("Error", data.error, "error");
							document.getElementById("input_imagen_noticia").value="";
							$("#remove").click();
		                }
		            }
		        });
	});

	$('#form_editarNoticia').submit(function ( e ) {
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url: route('noticias.actualizar').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href=route('noticias.index').url();
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
    e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
	});
	

	


});

function listarNoticias(){//metodo de listar la caracteristica determinada
	$("#tableNoticia tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	var table=$('#tableNoticia').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('noticias.datanoticias').url(),//url que hace la busqueda sql de la informacion
    
    "columns":[
    {"data":"imagen"},
    {"data":"fecha"},
    {"data":"titulo"},
    {"data":"publicado"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning btn-simple' rel='tooltip' data-placement='bottom' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='eliminar btn btn-danger btn-simple' rel='tooltip' data-placement='bottom' title='Eliminar'><i class='material-icons'>close</i></button>"
    }
    ],
  
	});
	
	editarNoticia("#tableNoticia tbody",table);
	eliminarNoticia("#tableNoticia tbody",table);

}


function editarNoticia(tbody,table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		location.href="/noticias/"+data.id+"/edit";
	});
}

function eliminarNoticia(tbody,table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar la noticia '+data.titulo+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {

		  if (result) {
		  	
		  	eliminarNoticiaAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarNoticiaAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('noticias.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarNoticias();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/******************************************************************************/

/***********************************NOVEDAD*************************************************/
$(document).ready(function() {
	
	listarNovedades();

	$('#form_novedad').submit(function ( e ) {
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url:  route('novedades.store').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href=route('novedades.index').url();
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
    e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
	});

	$("#input_imagen_novedad").change(function(e) {
	    var data = new FormData(this); //Creamos los datos a enviar con el formulario
	    

	    var inputFileImage = $(this)[0];
	    console.log($("#input_imagen_novedad")[0]);
		var file = inputFileImage.files[0];
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
		
		data.append('imagen',file);
		data.append("_token", _token);
	    console.log(data);
	    $.ajax({//peticion ajax
		            url: route('novedades.validar_imagen').url(),//url del controller que guarda la peticion
		            type:'POST',
		             data: data,
		             processData: false, //Evitamos que JQuery procese los datos, daría error
	        		contentType: false, //No especificamos ningún tipo de dato
	        
		             success: function(data) {
		                if($.isEmptyObject(data.error)){
		                }else{
							swal("Error", data.error, "error");
							document.getElementById("input_imagen_novedad").value="";
							$("#remove").click();
		                }
		            }
		        });
	});

	$('#form_editarNovedad').submit(function ( e ) {
    var data = new FormData(this); //Creamos los datos a enviar con el formulario
    console.log(data);
    $.ajax({//peticion ajax
	            url: route('novedades.actualizar').url(),//url del controller que guarda la peticion
	            type:'POST',
	             data: data,
	             processData: false, //Evitamos que JQuery procese los datos, daría error
        		contentType: false, //No especificamos ningún tipo de dato
        
	             success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	swal("Excelente!", data.success, "success").then(function() {
	                		location.href=route('novedades.index').url();
	                	});
	                }else{
						printErrorMsg(data.error);
	                }
	            }
	        });
 
    e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
	});
	

	


});

function listarNovedades(){//metodo de listar la caracteristica determinada
	$("#tableNovedad tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	var table=$('#tableNovedad').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": route('novedades.datanovedades').url(),//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"imagen"},
    {"data":"fecha"},
    {"data":"titulo"},
    {"data":"publicado"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning btn-simple' rel='tooltip' data-placement='bottom' title='Editar'><i class='material-icons'>edit</i><div class='ripple-container'></div></button><button type='button' class='eliminar btn btn-danger btn-simple' rel='tooltip' data-placement='bottom' title='Eliminar'><i class='material-icons'>close</i></button>"
    }
    ],
  
	});
	
	editarNovedad("#tableNovedad tbody",table);
	eliminarNovedad("#tableNovedad tbody",table);

}


function editarNovedad(tbody,table){
	$(tbody).on("click", "button.editar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		location.href="/novedades/"+data.id+"/edit";
	});
}

function eliminarNovedad(tbody,table){
	$(tbody).on("click", "button.eliminar", function(){
		var data=table.row($(this).parents("tr")).data();//obtengo la informacion general de cada caracteristica
		swal({
		  text: 'Desea eliminar la novedad '+data.titulo+' ?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#119B15',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar',
		  cancelButtonText: 'Cancelar',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: true,
		  reverseButtons: true
		}).then((result) => {

		  if (result) {
		  	
		  	eliminarNovedadAjax(data.id);
		    
		  // result.dismiss can be 'cancel', 'overlay',
		  // 'close', and 'timer'
		  } 
		})
	});
}


function eliminarNovedadAjax(id){
			var _token = "csrf_token()";
	    	$.ajax({
	            url:  route('novedades.eliminar').url(),
	            type:'GET',
	            data: {_token:_token, id:id},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	listarNovedades();
	                	swal('Eliminado!', data.success, 'success');
	                }else{
	                	swal("Error", data.error, "error");
	                	
	                }
	            }
	        });
}

/***************************************************/
Dropzone.options.myDropzone = {
            
            autoQueue: false,
            uploadMultiple: true,
            maxFilesize: 0.1,
            previewsContaines: null,
            dicDefaultMessage: "Ponlos Aquí",
            dictFallbackMessage: "Tu navegador no soporta drag and drop prueba dando click",
            dictFallbackText:"Please use the fall",
            dictFileTooBig:"Es demasiado grande",
            dictInvalidFileType: "no puede subir ese archivo",
            dictCancelUpload:"Cancelar",
            dictRemoveFile:"Quitar",
            dictCancelUploadConfirmation:"Seguro quiere?",
            
            init: function() {
                var i=0;
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
                });
                this.on("addedfile", function(file) {/*input de carga de file pnetworkingeterminada*/
                      caption = file.caption == undefined ? "" : file.caption;
                      textoarchivo="texto["+i+"]";
                      var informacion="<div class='form-group label-floating'>"+
                                            "<input type='hidden' class='form-control' size='5'  id='id' name='id'>"+
                                            "<input class='form-control' size='5' id='informacion' placeholder='Descripción' id='"+file.filename+"' type='text' name='"+textoarchivo+"' value="+caption+" >"+
                                        "</div>"
                      file._captionBox = Dropzone.createElement(informacion);
                      file.previewElement.appendChild(file._captionBox);
                      i++;
                      var botones="<button class='btn btn-success btn-just-icon btn-round start' rel='tooltip' data-placement='top' title='Subir'><i class='material-icons' >backup</i></button>"
                      file._captionB = Dropzone.createElement(botones);
                      file.previewElement.appendChild(file._captionB);
                      var botones="<button class='btn btn-danger btn-just-icon btn-round eliminar' rel='tooltip' data-placement='top' title='Eliminar'><i class='material-icons'>highlight_off</i></button>"
                      file._captionB = Dropzone.createElement(botones);
                      file.previewElement.appendChild(file._captionB);
                      file.previewElement.querySelector(".start").onclick = function(e) { e.preventDefault();myDropzone.enqueueFile(file); };
                      file.previewElement.querySelector(".eliminar").onclick = function(e) { e.preventDefault();myDropzone.removeFile(file); };
                }),
                this.on("sending", function(file, xhr, formData) {
                  // Will send the filesize along with the file as POST data.
                  var informacion= file.previewElement.querySelector("#informacion").value;
                  formData.append("datos", informacion);
                  file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
                });
                this.on("success", function(file, response) {
                    file.previewElement.querySelector("#id").value=response.data;
                });

                this.on("error", function(file, response) {
                    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
                });
                thisDropzone = this;
                var ruta= route('imagen.cargar').url();
                 $.get(ruta, function(data) {

                        console.log(data);
                        $.each(data, function(key,value){

                          var mockFile = { name: value.imagen.file_name, size: value.size };
                            console.log(value);
                            thisDropzone.on("addedfile", function(file) {
                            	file.previewElement.querySelector("#id").value=value.imagen.id;
                            	file.previewElement.querySelector("#informacion").value=value.imagen.description;
                            	console.log("archiva");
                            });
                            thisDropzone.emit("addedfile", mockFile);
                            thisDropzone.emit("thumbnail", mockFile, value.imagen.file_name);

                            thisDropzone.emit("complete", mockFile);
                             thisDropzone.options.thumbnailWidth="50";
                             thisDropzone.options.thumbnailHeight="50";
                            //thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                            //thisDropzone.options.thumbnail.call(thisDropzone, mockFile, value.imagen.file_name);
                             
                           
                        });
                         
                    });
                
                

            },
            /*success: function(file, response) {  arreglar esto para que salga el check
              //alert(response);
               file.previewElement.querySelector("#id").value=response.data;
            },*/
            removedfile: function(file,serverFileName){
                var id=file.previewElement.querySelector("#id").value;
                var _token = document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value;
                console.log(file);
                $.ajax({
                    type:"post",

                    url: route('imagen.eliminar').url(),
                    data:{id:id,_token:_token},
                    success:function(data){
                        if($.isEmptyObject(data.error)){
                            var element;
                            (element=file.previewElement)!=null ?
                                element.parentNode.removeChild(file.previewElement):
                                    false;
                            alert("Se eliminó");
                        }
                        
                    }
                })
            }
        };

 $('.flexslider').flexslider({
    animation: "slide"
  
});

 /***************caracteristicas microscopicas bacterias*******************/

function ocultar(id){//oculta un elemento del formulario
document.getElementById(id).style.display = 'none';
}
function mostrar(id){//muestra un elemento del formulario
document.getElementById(id).style.display = 'block';
}

function quitarCheckRadio(clase){
	var array=document.getElementsByClassName(clase);
	for (var i = 0; i < array.length; i++) {
    array[i].checked=0;
	}
	
}

/********************metodos conservacion***************/
$(document).ready(function() {

	var pathname = window.location.pathname;
	if(pathname.includes("metodos_conservacion")){//valido que se encuentre en la url crear cepaxmedio
		  $('#select_metodo').css('width','100%');//mantiene el width del select2 dentro del modal
		  $('#select_metodo').select2({
		        language: "es"
		    });
		ocultar("microgota"); //oculto el div de microgota que es solo para algunos metodos
		metodosSelect();//cargo en el select los metodos registrados
		$( "#select_metodo" ).change(function() {//1:solucion_salina, 2:glicerol, 3: suelo, 4: agar semisolido, 5:agar solido caja, 6:agar solido tubo, 7:caldo
			if($( "#select_metodo" ).val()<4 || $( "#select_metodo" ).val()>6 ){//si no es agar de cualquier tipo
				mostrar("microgota");
			}else{
				ocultar("microgota");
			}
		});
	}

	$('#modal_form').on('hidden.bs.modal', function(){ //cuando cierre el modal de cualquier forma
	$(this).find('form')[0].reset(); //borra todos los datos que tenga los input, textareas, select.
	$('#select_metodo').val("").trigger('change.select2');
	});

$('#fullCalendar').fullCalendar({
	locale:'es',
	defaultView: 'month',
	header:{
			  left:   'prevYear, nextYear, title',
			  center: '',
			  right:  'today prev,next'
			},

	dayClick: function(date, jsEvent, view, resourceObj) {

	   var id_cepa=$('#id_cepa').val();
	   var fecha=date.format('YYYY-MM-DD');
	   var post = {id:id_cepa , fecha:fecha };
	   //location.href=route('evento.cargar',post).url();
	   console.log(fecha);
	   document.getElementById("start").value=fecha;
	   document.getElementById("id_cepa").value=document.getElementById("id_cep").value;
	   $('#modal_form').modal('show');

  },
  eventClick: function(calEvent,jsEvent,view){
  	console.log(calEvent);
  	document.getElementById("id").value =calEvent.id;
  	document.getElementById("id_cepa").value =calEvent.id_cepa;
  	document.getElementById("start").value =calEvent.start.format('YYYY-MM-DD');
  	$('#select_metodo').val(calEvent.id_tipo).trigger('change.select2');
  	document.getElementById("numero_replicas").value =calEvent.numero_replicas;
  	document.getElementById("recuento").value =calEvent.recuento;
  	if(calEvent.id_tipo<4 || calEvent.id_tipo>6 ){//si no es agar de cualquier tipo
		mostrar("microgota");
		document.getElementById("input_microgota").value =calEvent.microgota;
	}else{
		ocultar("microgota");
	}
  	
  	$('#modal_form').modal('show');
  },
  
  events: route('metodo.metodos_calendario').url(),
});
})



		


function metodosSelect(){
	var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
       // eliminamos todos los posibles valores que contenga el select2
        document.getElementById("select_metodo").options.length=1;
    $.ajax({//peticion ajax
            url: route('metodo.metodos').url(),//url del controller que guarda la peticion
            type:'POST',
            data: {_token:_token},
            success: function(data) {
                $.each( data.success, function( key, value ) {
                			document.getElementById("select_metodo").options[document.getElementById("select_metodo").options.length]=new Option(value.tipo, value.id);
				});
            }
        });
}
