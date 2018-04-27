<div class="box-header">
    <div class="row">
       
        <div class="col-sm-4">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGrupoMicrobiano">Añadir Grupo Microbiano</button>
        </div>
    </div>
</div>
@include('admin.caracteristicas.grupo_microbiano.formularioGrupomicrobiano')
<!----------------------------------TABLA DE GRUPO MICROBIANO---------------------------------------->


<!--<div class="alert alert-success print-success-msg" style="display:none">
        <ul>Grupo Microbiano agregada exitosamente!!!</ul>
    </div> -->
<div id="tableGrupoMicrobiano_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="tableGrupoMicrobiano" class="row-border" role="grid" aria-describedby="tableGrupoMicrobiano_info">
            <thead>
              <tr role="row">
                <th>Grupo Microbiano</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <tr role="row">
                <th width="30%" class="sorting_asc" tabindex="0" aria-controls="tableGrupoMicrobiano" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Grupo Microbiano</th>
                <th width="20%" tabindex="0" aria-controls="tableGrupoMicrobiano" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acción</th>
              </tr>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
</div>