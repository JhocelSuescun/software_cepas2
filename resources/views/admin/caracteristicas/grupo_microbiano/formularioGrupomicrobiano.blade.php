<!----------------------------------MODAL FORM GRUPO MICROBIANO---------------------------------------->

<div class="modal fade" id="modalGrupoMicrobiano" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registro Grupo Microbiano</h4>
      </div>
      <div class="modal-body">
        <!--
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> -->

        <form class="form-horizontal" id="form_grupomicrobiano" role="form">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id_grupomicrobiano" value="" id="id_grupomicrobiano">
            
            <div class="form-group{{ $errors->has('grupo_microbiano') ? ' has-error' : '' }}">
                
                <label  class="col-md-4 control-label">Grupo Microbiano</label>

                <div class="col-md-6">
                    <input id="grupo_microbiano" type="text" class="form-control" name="grupo_microbiano" value="{{ old('grupo_microbiano') }}" required autofocus>
                   <!-- @if ($errors->has('grupo_microbiano'))
                        <span class="help-block">
                            <strong>{{ $errors->first('grupo_microbiano') }}</strong>
                        </span>
                    @endif-->
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="button" id="añadirGrupoMicrobiano" class="btn btn-primary">Guardar</button>
                    <button type="button" id="cancelarGrupoMicrobiano" class="btn btn-default">Cancelar</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>