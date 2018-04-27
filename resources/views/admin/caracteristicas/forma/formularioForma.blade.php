
<!----------------------------------MODAL FORM FORMA---------------------------------------->

<div class="modal fade" id="modalForma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registro Forma</h4>
      </div>
      <div class="modal-body">
        <!--
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> -->

        <form class="form-horizontal" id="form_forma" role="form">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id_forma" value="" id="id_forma">
            
            <div class="form-group{{ $errors->has('forma') ? ' has-error' : '' }}">
                
                <label  class="col-md-4 control-label">Forma</label>

                <div class="col-md-6">
                    <input id="forma" type="text" class="form-control" name="forma" value="{{ old('forma') }}" required autofocus>
                   <!-- @if ($errors->has('forma'))
                        <span class="help-block">
                            <strong>{{ $errors->first('forma') }}</strong>
                        </span>
                    @endif-->
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="button" id="añadirForma" class="btn btn-primary">Guardar</button>
                    <button type="button" id="cancelarForma" class="btn btn-default">Cancelar</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>