<!----------------------------------MODAL FORM ORIGEN---------------------------------------->

<div class="modal fade" id="modalOrigen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registro Origen</h4>
      </div>
      <div class="modal-body">
        <!--
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> -->

        <form class="form-horizontal" id="form_origen" role="form">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id_origen" value="" id="id_origen">
            
            <div class="form-group{{ $errors->has('origen') ? ' has-error' : '' }}">
                
                <label  class="col-md-4 control-label">Origen</label>

                <div class="col-md-6">
                    <input id="origen" type="text" class="form-control" name="origen" value="{{ old('origen') }}" required autofocus>
                   <!-- @if ($errors->has('borde'))
                        <span class="help-block">
                            <strong>{{ $errors->first('borde') }}</strong>
                        </span>
                    @endif-->
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="button" id="añadirOrigen" class="btn btn-primary">Guardar</button>
                    <button type="button" id="cancelarOrigen" class="btn btn-default">Cancelar</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>