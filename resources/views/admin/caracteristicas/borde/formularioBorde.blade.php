<!----------------------------------MODAL FORM BORDE---------------------------------------->

<div class="modal fade" id="modalBorde" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registro Borde</h4>
      </div>
      <div class="modal-body">
        <!--
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> -->

        <form class="form-horizontal" id="form_borde" role="form">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id_borde" value="" id="id_borde">
            
            <div class="form-group{{ $errors->has('borde') ? ' has-error' : '' }}">
                
                <label  class="col-md-4 control-label">Borde</label>

                <div class="col-md-6">
                    <input id="borde" type="text" class="form-control" name="borde" value="{{ old('borde') }}" required autofocus>
                   <!-- @if ($errors->has('borde'))
                        <span class="help-block">
                            <strong>{{ $errors->first('borde') }}</strong>
                        </span>
                    @endif-->
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="button" id="añadirBorde" class="btn btn-primary">Guardar</button>
                    <button type="button" id="cancelarBorde" class="btn btn-default">Cancelar</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>