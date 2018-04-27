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
        generosSelect();
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
	    	alert("id " + id);
	    	$.ajax({//peticion ajax
	            url: "borde/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, borde:borde, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"borde");
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
	$("#tableBorde tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	var table=$('#tableBorde').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":  menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": "borde/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"borde"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    
    }
    ],
    
	});
	
	actualizarBorde("#tableBorde tbody",table);
	eliminarBorde("#tableBorde tbody",table);
	
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
		  if (result.value) {
		  	
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
	            url: "eliminarBorde",
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
	            url: "consistencia/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, consistencia:consistencia, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"consistencia");
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
    "ajax": "consistencia/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"consistencia"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    
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
		  if (result.value) {
		  	
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
	            url: "eliminarConsistencia",
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
	            url: "detalleoptico/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, detalle_optico:detalle_optico, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"do");
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
    "ajax": "detalleoptico/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"detalle_optico"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    
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
		  if (result.value) {
		  	
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
	            url: "eliminarDetalleOptico",
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
	            url: "elevacion/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, elevacion:elevacion, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"elevacion");
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
    "ajax": "elevacion/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"elevacion"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    
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
		  if (result.value) {
		  	
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
	            url: "eliminarElevacion",
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
	            url: "forma/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, forma:forma, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"forma");
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
    "ajax": "forma/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"forma"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    
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
		  if (result.value) {
		  	
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
	            url: "eliminarForma",
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
	            url: "superficie/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, superficie:superficie, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"superficie");
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
    "ajax": "superficie/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"superficie"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    
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
		  if (result.value) {
		  	
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
	            url: "eliminarSuperficie",
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
	            url: "genero/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, genero:genero, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"genero");
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
    "ajax": "genero/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"genero"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                        
                    
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
		  if (result.value) {
		  	
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
	            url: "eliminarGenero",
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
	generosSelect();
	$("#select_genero").css('width','100%');//mantiene el width del select2 dentro del modal
	$("#select_genero").select2({
		  language: "es"
	});
	$.fn.modal.Constructor.prototype.enforceFocus = function() {};

	
	$("#añadirEspecie").click(function(e){//cuando da click en el boton de guardar caracteristica
	    	e.preventDefault();
			var _token = $("input[name='_token']").val();//obtengo el token del formulario
	    	var especie = $("input[name='especie']").val();//obtengo la caracteristica del formulario
	    	var id_genero =$("#select_genero").val();//obtengo el id del genero seleccionado del formulario
	    	var id = $("input[name='id_especie']").val();//obtengo el id de la caracteristica del formulario
	    	$.ajax({//peticion ajax
	            url: "especie/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, especie:especie,id_genero:id_genero, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"especie");
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
	 	$('#select_genero').val('').trigger('change.select2');//deja la posicion del select2 a la inicial
		$("input[name='id_especie']").val("");
	});
});

function generosSelect(){
		var _token = $('meta[name="csrf-token"]').attr('content');//obtengo el token del formulario
	       // eliminamos todos los posibles valores que contenga el select2
        document.getElementById("select_genero").options.length=1;
		$.ajax({//peticion ajax
	            url: "genero/generos",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token},
	            success: function(data) {
	                $.each( data.success, function( key, value ) {
								document.getElementById("select_genero").options[document.getElementById("select_genero").options.length]=new Option(value.genero, value.id);
					});
	            }
	        });
}

function listarEspecies(){//metodo de listar la caracteristica determinada
	$("#tableEspecie tbody").remove(); //tengo que eliminar el body para que no se dupliquen los botones al volver a listar
	
	try{
	var table=$('#tableEspecie').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":     menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": "especie/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"especie"},
    {"data":"genero"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    
    }
    ],
    
	});
	}catch(error){
		alert("error especie "+ error);
	}
	
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
		  if (result.value) {
		  	
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
	            url: "eliminarEspecie",
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
	    	alert("id " + id);
	    	$.ajax({//peticion ajax
	            url: "grupomicrobiano/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, grupo_microbiano:grupo_microbiano, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"grupo");
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
	try{
	var table=$('#tableGrupoMicrobiano').DataTable({
	"destroy":true,//esto permite reinicializar el datatable varias veces
	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    "lengthMenu":  menuDatatable,
    "processing": true,//vuelve dinamico el datatable
    "serverSide": true,//maneja informacion del lado del servidor, es decir, no carga todos los datos al tiempo sino depende de lo que necesite
    "ajax": "grupomicrobiano/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"grupo_microbiano"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    
    }
    ],
    
	});
	}catch(error){
		alert("error grupo "+ error);
	}
	
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
		  if (result.value) {
		  	
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
	            url: "eliminarGrupo",
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
	    	alert("id " + id);
	    	$.ajax({//peticion ajax
	            url: "origen/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, origen:origen, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"origen");
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
    "ajax": "origen/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"origen"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    
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
		  if (result.value) {
		  	
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
	            url: "eliminarOrigen",
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
	    	alert("id " + id);
	    	$.ajax({//peticion ajax
	            url: "medio/store",//url del controller que guarda la peticion
	            type:'POST',
	            data: {_token:_token, medio:medio, id:id},//datos que envio
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	printSuccessMsg(data.success,"medio");
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
    "ajax": "medio/index",//url que hace la busqueda sql de la informacion
    "columns":[
    {"data":"medio"},
    {"defaultContent":"<button type='button' class='editar btn btn-warning'><i class='fa fa-pencil-square-o'></i>Editar</button>	<button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i>Eliminar</button>"
                    
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
		  if (result.value) {
		  	
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
	            url: "eliminarMedio",
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
