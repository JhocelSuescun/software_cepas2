<!----------------------------------MODAL FORM DETALLE OPTICO---------------------------------------->

<div class="modal fade" id="modalDetalleOptico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registro Detalle Óptico</h4>
      </div>
      <div class="modal-body">
        <!--
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> -->

        <form class="form-horizontal" id="form_detalleoptico" role="form">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id_detalle" value="" id="id_detalle">
            
            <div class="form-group{{ $errors->has('detalle_optico') ? ' has-error' : '' }}">
                
                <label  class="col-md-4 control-label">DetalleOptico</label>

                <div class="col-md-6">
                    <input id="detalle_optico" type="text" class="form-control" name="detalle_optico" value="{{ old('detalle_optico') }}" required autofocus>
                   <!-- @if ($errors->has('detalle_optico'))
                        <span class="help-block">
                            <strong>{{ $errors->first('detalle_optico') }}</strong>
                        </span>
                    @endif-->
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="button" id="añadirDetalleOptico" class="btn btn-primary">Guardar</button>
                    <button type="button" id="cancelarDetalleOptico" class="btn btn-default">Cancelar</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>