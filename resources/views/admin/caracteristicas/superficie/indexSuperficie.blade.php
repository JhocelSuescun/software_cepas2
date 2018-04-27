<div class="box-header">
    <div class="row">
       
        <div class="col-sm-4">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSuperficie">Añadir Superficie</button>
        </div>
    </div>
</div>
@include('admin.caracteristicas.superficie.formularioSuperficie')

<!----------------------------------TABLA DE SUPERFICIES---------------------------------------->


<!--<div class="alert alert-success print-success-msg" style="display:none">
        <ul>Superficie agregada exitosamente!!!</ul>
    </div> -->
<div id="tableSuperficie_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="tableSuperficie" class="row-border" role="grid" aria-describedby="tableSuperficie_info">
            <thead>
              <tr role="row">
                <th>Superficie</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <tr role="row">
                <th width="30%" class="sorting_asc" tabindex="0" aria-controls="tableSuperficie" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Superficie</th>
                <th width="20%" tabindex="0" aria-controls="tableSuperficie" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acción</th>
              </tr>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
</div>

   


    