<!DOCTYPE html>
<html>
<head>
    <title>Datatables Server Side Processing in Laravel</title>
     <meta name="token" content="{{ csrf_token() }}">
    <link href="{{ asset ("assets/css/bootstrap.min.css")}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset ("assets/css/material-dashboard.css?v=1.2.1")}}" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="{{ asset ("assets/js/jquery-3.2.1.min.js")}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row"    >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Dropzone
                </div>
                <div class="panel-body">
                    <form action="{{ asset('/proyecto/imagenes') }}"
                      class="dropzone"
                      id="my-dropzone">
                      {{ csrf_field() }}
                    <div class="dz-message" style="height:200px;">
                        Subalos
                    </div>

                    <div class="dropzone-previews"></div>
                    <button type="submit" class="btn btn-success" id="submit">Save</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
<script>
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
                                            "<input class='form-control informacion' size='5' placeholder='Descripción' id='"+file.filename+"' type='text' name='"+textoarchivo+"' value="+caption+" >"+
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
                  var informacion= file.previewElement.querySelector(".informacion").value;
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
                 $.get('../cargarimagenes', function(data) {

                        console.log(data);
                        $.each(data, function(key,value){
                          var mockFile = { name: value.imagen.file_name, size: value.size };
                            
                            thisDropzone.emit("addedfile", mockFile);
                            thisDropzone.emit("thumbnail", mockFile, "imagenes/"+value.imagen.file_name);
                            thisDropzone.emit("complete", mockFile);
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
                var _token = document.querySelectorAll('meta[name=token]')[0].getAttributeNode('content').value;
                console.log(file);
                $.ajax({
                    type:"post",
                    url:'/eliminarimagenes',
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
    </script>
</html>

    

