@extends('layouts.template2')
@section('content')

<div class="content">
                <div class="container-fluid">
                  <div class="col-md-12">
    


        <div class="card">

        <div class="card-header card-header-text" data-background-color="purple">
            <h4 class="card-title">Proyectos Registrados</h4>
            
        </div>
        <div class="card-content">
          <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('proyectos.create') }}">Añadir Proyecto</a>
         
        </div>
         <table id="tableProyecto" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre Proyecto</th>
                        <th>Estado</th>
                        <th>Cepas Asociadas</th>
                        <th>Fecha Aislamiento</th>
                        <th>Lugar Aislamiento</th>
                        <th>Aislador</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th  width="20%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nombre Proyecto</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Estado</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Cepas Asociadas</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Fecha Aislamiento</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Lugar Aislamiento</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Aislador</th>
                               
                    </tr>
                </tfoot>
            </table>
           

        </div>
    </div>


</div>


</div>
</div>
@endsection