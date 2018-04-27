@extends('layouts.template2')
@section('content')

<div class="content">
                <div class="container-fluid">
                  <div class="col-md-12">
    


        <div class="card">

        <div class="card-header card-header-text" data-background-color="purple">
            <h4 class="card-title">Caracterización Fisiológica Cepa {{$codigo_cepa}}</h4>
            <input type="hidden" id="id_cepa" value={{$id_cepa}}>
        </div>
        <div class="card-content">
          <div class="col-sm-6 col-lg-3">
          <a class="btn btn-primary" href="{{ route('caracterizacion_fisiologica.crear', ['id' => $id_cepa]) }}">Añadir Caracterización</a>
          </div>
          <div class="col-sm-6 col-lg-3">
            <a class="btn btn-default" href="{{ route('medios_selectivos.mostrar', ['id' => $id_cepa]) }}">Medios Selectivos</a>
          </div>
          <div class="col-sm-6 col-lg-3">
            <a class="btn btn-default" href="{{ route('identificacion_molecular.mostrar', ['id' => $id_cepa]) }}">Identificación Molecular</a>
          </div>
          <div class="col-sm-6 col-lg-3">
            <a class="btn btn-default" href="{{ url('cepa') }}">Cepas Registradas</a>
          </div>
          
          
            <div id="tableCaracterizacionFisiologica_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
                <div class="col-sm-12">
                  <table id="tableCaracterizacionFisiologica" class="row-border" role="grid" aria-describedby="tableCepa_info">
                    <thead>
                      <tr role="row">
                        <th>Fecha</th>
                        <th>Ácido Indolacético</th>
                        <th>Solubilización Fosfatos</th>
                        <th>Producción Sideróforos</th>
                        <th>Fijación Biológica Nitrogeno</th>
                        <th>Ácido Salicílico</th>
                        <th>Actividad Enzimática</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    
                    <tfoot>
                      <tr>
                        <tr role="row">
                        <th  width="10%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Fecha</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Ácido Indolacético</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Solubilización Fosfatos</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Producción Sideróforos</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Fijación Biológica Nitrogeno</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Ácido Salicílico</th>
                        <th width="25%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Actividad Enzimática</th>
                        <th width="20%" tabindex="0" aria-controls="tableCaracterizacionFisiologica" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acción</th>
                      </tr>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
          </div>

        </div>
    </div>


</div>


</div>
</div>
@endsection