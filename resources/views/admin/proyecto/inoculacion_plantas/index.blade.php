@extends('layouts.template2')
@section('content')

<div class="content">
                <div class="container-fluid">
                  <div class="col-md-12">
    


        <div class="card">

        <div class="card-header card-header-text" data-background-color="purple">
            <h4 class="card-title">Inoculación Plantas Proyecto: {{$nombre_proyecto}}</h4>
            <input type="hidden" id="id_proyecto" value={{$id_proyecto}}>
        </div>
        <div class="card-content">
          <div class="col-sm-6 col-lg-3">
          <a class="btn btn-primary" href="{{ route('inoculacion_plantas.crear', ['id' => $id_proyecto]) }}">Añadir Inoculación</a>
        </div>
        <div class="col-sm-6 col-lg-3">
          <a class="btn btn-default" href="{{ url('proyectos') }}">Proyectos Registrados</a>
        </div>
           <table id="tableInoculacionPlantas" class="display" role="grid" aria-describedby="tableInoculacionPlantas_info">
                    <thead>
                      <tr role="row">
                        <th></th>
                        <th>Fecha</th>
                        <th>Cultivo</th>
                        <th>Variables</th>
                        <th>Rendimiento (g m^-2)</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    
                    <tfoot>
                      <tr role="row">
                        <th></th>
                        <th  width="20%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Fecha</th>
                        <th  width="20%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Cultivo</th>
                        <th  width="20%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Variables</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Rendimiento</th>
                        <th  width="20%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Acción</th>
                      </tr>
                    </tfoot>
                  </table>
                
        </div>
    </div>


</div>


</div>
</div>
@endsection