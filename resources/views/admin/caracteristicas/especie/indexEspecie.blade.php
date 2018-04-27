<div class="box-header">
    <div class="row">
       
        <div class="col-sm-4">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEspecie">Añadir Especie</button>
        </div>
    </div>
</div>
@include('admin.caracteristicas.especie.formularioEspecie')

<!----------------------------------TABLA DE ESPECIES---------------------------------------->


<!--<div class="alert alert-success print-success-msg" style="display:none">
        <ul>Especie agregada exitosamente!!!</ul>
    </div> -->
<div id="tableEspecie_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="tableEspecie" class="row-border" role="grid" aria-describedby="tableEspecie_info">
            <thead>
              <tr role="row">
                <th>Especie</th>
                <th>Género</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <tr role="row">
                <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableEspecie" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Especie</th>
                <th width="15%" class="sorting_asc" tabindex="0" aria-controls="tableEspecie" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Género</th>
                <th width="10%" tabindex="0" aria-controls="tableEspecie" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acción</th>
              </tr>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
</div>

   


