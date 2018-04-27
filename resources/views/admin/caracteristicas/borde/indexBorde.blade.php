<div>
<div class="box-header">
    <div class="row">
       
        <div class="col-sm-4">
          
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBorde">Añadir Borde</button>
        </div>
    </div>
</div>
@include('admin.caracteristicas.borde.formularioBorde')
<!----------------------------------TABLA DE BORDE---------------------------------------->


<!--<div class="alert alert-success print-success-msg" style="display:none">
        <ul>Borde agregada exitosamente!!!</ul>
    </div> -->
    <div class="col-4">
          <table id="tableBordes" class="row-border" style="width:100%">
            <thead>
              <tr role="row">
                <th>Borde</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <tr role="row">
                <th width="30%" class="sorting_asc" tabindex="0" aria-controls="tableBorde" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Borde</th>
                <th width="20%" tabindex="0" aria-controls="tableBorde" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acción</th>
              </tr>
              </tr>
            </tfoot>
          </table>
      </div>

   </div>