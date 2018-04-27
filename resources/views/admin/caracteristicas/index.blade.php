@extends('layouts.template2')
@section('content')

<div class="content">
                <div class="container-fluid">
                    
                  <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Características Generales
                        </h3>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="nav nav-pills nav-pills-success nav-stacked">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab1" aria-expanded="true">Borde</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab2" aria-expanded="false">Consistencia</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab3" aria-expanded="false">Detalle Óptico</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab4" aria-expanded="false">Elevación</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab5" aria-expanded="false">Forma</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab6" aria-expanded="false">Superficie</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab7" aria-expanded="false">Género</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab8" aria-expanded="false">Especie</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab9" aria-expanded="false">Grupo Microbiano</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab10" aria-expanded="false">Origen</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab11" aria-expanded="false">Medio</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                       @include('admin.caracteristicas.borde.indexBorde')
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                       @include('admin.caracteristicas.consistencia.indexConsistencia')
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                       @include('admin.caracteristicas.detalle_optico.indexDetalleoptico')
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                       @include('admin.caracteristicas.elevacion.indexElevacion')
                                    </div>
                                    <div class="tab-pane" id="tab5">
                                       @include('admin.caracteristicas.forma.indexForma')
                                    </div>
                                    <div class="tab-pane" id="tab6">
                                       @include('admin.caracteristicas.superficie.indexSuperficie')
                                    </div>
                                    <div class="tab-pane" id="tab7">
                                       @include('admin.caracteristicas.genero.indexGenero')
                                    </div>
                                    <div class="tab-pane" id="tab8">
                                       @include('admin.caracteristicas.especie.indexEspecie')
                                    </div>
                                    <div class="tab-pane" id="tab9">
                                       @include('admin.caracteristicas.grupo_microbiano.indexGrupomicrobiano')
                                    </div>
                                    <div class="tab-pane" id="tab10">
                                       @include('admin.caracteristicas.origen.indexOrigen')
                                    </div>
                                    <div class="tab-pane" id="tab11">
                                       @include('admin.caracteristicas.medio.indexMedio')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
                </div>
</div>
@endsection       
