<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_metodos_conservacion" class="form-horizontal" role="form" method="POST" action="{{ route('metodos_conservacion.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="text" class="form-control" id="id" name="id">
          <input type="text" class="form-control" id="id_cepa" name="id_cepa">
          <input type="text" class="form-control" id="start" name="start">
                            
          <div class="row">
              <label class="col-md-4 label-on-left">Método Conservación</label>
              <div class="col-md-6">
                  <div class="form-group label-floating is-empty">
                      <select id="select_metodo" name="metodo_conservacion">
                              <option value="" disabled selected>Seleccione un método de conservación...</option>
                      </select>
                  </div>
              </div>
              
          </div>
          <div class="row">
              <label class="col-md-4 label-on-left">Número de réplicas</label>
              <div class="col-md-6">
                  <div class="form-group label-floating is-empty">
                      <label class="control-label"></label>
                      <input type="text" class="form-control" id="numero_replicas" name="numero_replicas">
                  </div>
              </div>
          </div>
          <div class="row">
              <label class="col-md-4 label-on-left">Recuento</label>
              <div class="col-md-6">
                  <div class="form-group label-floating is-empty">
                      <label class="control-label"></label>
                      <input type="text" class="form-control" id="recuento" name="recuento">
                  </div>
              </div>
          </div>
          <div id="microgota" class="row">
              <label class="col-md-4 label-on-left">Microgota</label>
              <div class="col-md-6">
                  <div class="form-group label-floating is-empty">
                      <label class="control-label"></label>
                      <input type="text" class="form-control" id="input_microgota" name="microgota">
                  </div>
              </div>
          </div>
          <div class="row">
              <label class="col-md-4 label-on-left">Color</label>
              <div class="col-md-1">
                  <div class="form-group label-floating is-empty">
                      <label class="control-label"></label>
                      <input type="color" class="form-control" name="color">
                  </div>
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>