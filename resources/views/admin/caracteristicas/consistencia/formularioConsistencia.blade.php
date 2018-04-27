<!----------------------------------MODAL FORM CONSISTENCIA---------------------------------------->

<div class="modal fade" id="modalConsistencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registro Consistencia</h4>
      </div>
      <div class="modal-body">
        <!--
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> -->

        <form class="form-horizontal" id="form_consistencia" role="form">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id_consistencia" value="" id="id_consistencia">
            
            <div class="form-group{{ $errors->has('consistencia') ? ' has-error' : '' }}">
                
                <label  class="col-md-4 control-label">Consistencia</label>

                <div class="col-md-6">
                    <input id="consistencia" type="text" class="form-control" name="consistencia" value="{{ old('consistencia') }}" required autofocus>
                   <!-- @if ($errors->has('consistencia'))
                        <span class="help-block">
                            <strong>{{ $errors->first('consistencia') }}</strong>
                        </span>
                    @endif-->
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="button" id="añadirConsistencia" class="btn btn-primary">Guardar</button>
                    <button type="button" id="cancelarConsistencia" class="btn btn-default">Cancelar</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>