
<!----------------------------------MODAL FORM ESPECIE---------------------------------------->

<div class="modal fade" id="modalEspecie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registro Especie</h4>
      </div>
      <div class="modal-body">
        <!--
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> -->

        <form class="form-horizontal" id="form_especie" role="form" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id_especie" value="" id="id_especie">
            
              <div class="form-group">
                <label class="col-md-4 control-label">Genero</label>
                <div class="col-md-6">
                    <select id="select_genero" name="id_genero">
                            <option value="" disabled selected>Seleccione un género...</option>
                            
                    </select>
                </div>
              </div>
          
              <div class="form-group{{ $errors->has('especie') ? ' has-error' : '' }}">
                  <label for="especie" class="col-md-4 control-label">Especie</label>

                  <div class="col-md-6">
                      <input id="especie" type="text" class="form-control" name="especie" value="{{ old('especie') }}" required autofocus>

                      @if ($errors->has('especie'))
                          <span class="help-block">
                              <strong>{{ $errors->first('especie') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                      <button type="button" id="añadirEspecie" class="btn btn-primary">Guardar</button>
                      <button type="button" id="cancelarEspecie" class="btn btn-default">Cancelar</button>
                  </div>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>