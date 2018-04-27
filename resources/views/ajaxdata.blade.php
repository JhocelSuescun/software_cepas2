<!DOCTYPE html>
<html>
<head>
    <title>Datatables Server Side Processing in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

</head>
<body>

<div class="container">
    <br />
    <h3 align="center">Datatables Server Side Processing in Laravel</h3>
    <br />
    <table id="student_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
    </table>

    <form action="{{ asset('/proyecto/2/imagenes') }}"
      class="dropzone"
      id="my-awesome-dropzone">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-success" id="submit">Save</button>
    </form>


  
</form>


</div>
<!--
<script type="text/javascript">
$(document).ready(function() {
     $('#student_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('ajaxdata.getdata') }}",
        "columns":[
            { "data": "first_name" },
            { "data": "last_name" }
        ]
     });
});
</script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script src="{{ asset ("assets/js/jquery-3.2.1.min.js")}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {

    Dropzone.options.myAwesomeDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            addRemoveLinks:true,
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
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {/*input de carga de file pnetworkingeterminada*/
                      caption = file.caption == undefined ? "" : file.caption;
                      textoarchivo="texto["+i+"]";
                      file._captionLabel = Dropzone.createElement("<p>Descripción:</p>")
                      file._captionBox = Dropzone.createElement("<input id='"+file.filename+"' type='text' name='"+textoarchivo+"' value="+caption+" >");
                      file.previewElement.appendChild(file._captionLabel);
                      file.previewElement.appendChild(file._captionBox);
                      i++;
                }),
                
                
 
                this.on("success", 
                    myDropzone.processQueue.bind(myDropzone)
                );

                $.get('/cargarimagenes', function(data) {
    
            <!-- 5 -->console.log(data)
                    $.each(data, function(key,value){
                         
                        var mockFile = { name: value.name, size: value.size };
                         
                        myDropzone.options.addedfile.call(this, mockFile);
         
                        myDropzone.options.thumbnail.call(this, mockFile, "projects/"+value.name);
                         
                    });
                     
                });
            },
            removedfile: function(file,serverFileName){
                var name=file.name;
                var _token = "csrf_token()";
                $.ajax({
                    type:"post",
                    url:'/proyecto/2/eliminarimagenes',
                    data:{filename:name,_token:_token},
                    success:function(data){
                        var json=JSON.parse(data);
                        if(json.res==true){
                            var element;
                            (element=file.previewElement)!=null ?
                                element.parentNode.removeChild(file.previwElement):
                                    false;
                                alert("elemento eliminado");
                        }
                    }
                })
            }
        };

});
</script>
</body>
</html>