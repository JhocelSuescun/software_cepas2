<!----------------------------------MODAL FORM INVESTIGADOR---------------------------------------->
<div class="box-header">
    <div class="row">
       
        <div class="col-sm-4">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInvestigador">Añadir Investigador</button>
        </div>
    </div>
</div>
<div class="modal fade" id="modalInvestigador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registro Investigador</h4>
      </div>
      <div class="modal-body">
        <!--
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> -->

        <form class="form-horizontal" id="form_investigador" role="form" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id_investigador" value="" id="id_investigador">
            
            <div class="form-group">
                
                <label  class="col-md-4 control-label">Nombres</label>

                <div class="col-md-6">
                    <input id="nombres" type="text" class="form-control" name="nombres" required autofocus>
                   
                </div>
            </div>
            <div class="form-group">
                
                <label  class="col-md-4 control-label">Apellidos</label>

                <div class="col-md-6">
                    <input id="apellidos" type="text" class="form-control" name="apellidos" required autofocus>
                   
                </div>
            </div>
            <div class="form-group">
                
                <label  class="col-md-4 control-label">Codigo</label>

                <div class="col-md-6">
                    <input id="codigo" type="text" class="form-control" name="codigo" required autofocus>
                   
                </div>
            </div>
            <div class="form-group">
                
                <label  class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control" name="email"  required autofocus>
                   
                </div>
            </div>
            <div class="form-group">
                
                <label  class="col-md-4 control-label">Url CVLAC</label>

                <div class="col-md-6">
                    <input id="url_cvlac" type="text" class="form-control" name="url_cvlac" required autofocus>
                   
                </div>
            </div>

        

             <div class="form-group">
                <label  class="col-md-4 control-label">Imagen</label>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <img id="imagen2" src="{{asset("assets/img/image_placeholder.jpg")}}" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input name="imagen" id="input_imagen_investigador" type="file">
                        </span>
                    <a href="#pablo" id="remove" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" id="añadirInvestigador" class="btn btn-primary">Guardar</button>
                    <button type="button" id="cancelarInvestigador" class="btn btn-default">Cancelar</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>