@extends('layouts.template2')
@section('content')

<div class="content">
                <div class="container-fluid">
                  <div class="col-md-12">
    


        <div class="card">

        <div class="card-header card-header-text" data-background-color="purple">
            <h4 class="card-title">Medios Registrados Cepa {{$codigo_cepa}}</h4>
            <input type="hidden" id="id_cepa" value={{$id_cepa}}>
        </div>
        <div class="card-content">
          <div class="col-sm-6 col-lg-3">
          <a class="btn btn-primary" href="{{ route('medios_selectivos.crear', ['id' => $id_cepa]) }}">Añadir Medio</a>
          </div>
          <div class="col-sm-6 col-lg-3">
            <a class="btn btn-default" href="{{ route('caracterizacion_fisiologica.mostrar', ['id' => $id_cepa]) }}">Caracterización Fisiológica</a>
          </div>
          <div class="col-sm-6 col-lg-3">
            <a class="btn btn-default" href="{{ route('identificacion_molecular.mostrar', ['id' => $id_cepa]) }}">Identificación Molecular</a>
          </div>
          <div class="col-sm-6 col-lg-3">
            <a class="btn btn-default" href="{{ url('cepa') }}">Cepas Registradas</a>
          </div>
            
            <table id="tableCepaXMedios" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Medio</th>
                        <th>Borde</th>
                        <th>Consistencia</th>
                        <th>Detalle Óptico</th>
                        <th>Elevación</th>
                        <th>Forma</th>
                        <th>Superficie</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th width="4%"></th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Medio</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Borde</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Consistencia</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Detalle Óptico</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Elevación</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Forma</th>
                        <th width="30%" class="sorting_asc" tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Superficie</th>
                               
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


</div>


</div>
</div>
@endsection