
<!----------------------------------MODAL FORM GENERO---------------------------------------->

<div class="modal fade" id="modalGenero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registro Genero</h4>
      </div>
      <div class="modal-body">
        <!--
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> -->

        <form class="form-horizontal" id="form_genero" role="form">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id_idgenero" value="" id="id_idgenero">
            
            <div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
                
                <label  class="col-md-4 control-label">Genero</label>

                <div class="col-md-6">
                    <input id="genero" type="text" class="form-control" name="genero" value="{{ old('genero') }}" required autofocus>
                   <!-- @if ($errors->has('genero'))
                        <span class="help-block">
                            <strong>{{ $errors->first('genero') }}</strong>
                        </span>
                    @endif-->
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="button" id="añadirGenero" class="btn btn-primary">Guardar</button>
                    <button type="button" id="cancelarGenero" class="btn btn-default">Cancelar</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>