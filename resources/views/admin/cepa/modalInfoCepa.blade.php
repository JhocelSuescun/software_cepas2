<div class="modal fade" id="modalInfoCepa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Información Cepa</h4>
      </div>
      <div class="modal-body">
        <!--
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div> -->

        <form class="form-horizontal" id="form_borde" role="form">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" value="" id="info_id_cepa">
            
            <div class="form-group">
                <label  class="col-md-4 control-label"><strong>Código: </strong></label><label id="info_codigo_cepa"></label>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label"><strong>Género: </strong></label><label id="info_genero_cepa"></label>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label"><strong>Especie: </strong></label><label id="info_especie_cepa"></label>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label"><strong>Grupo Microbiano: </strong></label><label id="info_grupomicrobiano_cepa"></label>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label"><strong>Origen: </strong></label><label id="info_origen_cepa"></label>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label"><strong>Morfología: </strong></label><label id="info_morfologia_cepa"></label>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label"><strong>Tinción Gram: </strong></label><label id="info_tinciongram_cepa"></label>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label"><strong>Motilidad: </strong></label><label id="info_motilidad_cepa"></label>
            </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="button" id="editarCepa" class="btn btn-warning">Editar</button>
                    <button type="button" id="eliminarCepa" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>