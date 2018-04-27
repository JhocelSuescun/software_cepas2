@extends('layouts.template')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>




       



<!-- START CUSTOM TABS -->
      <h2 class="page-header">AdminLTE Custom Tabs</h2>
      <div class="col-md-4">
                            <div class="card">
                                <div class="card-header card-chart" data-background-color="green">
                                    <div></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title">Daily Sales</h4>
                                    <p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i> updated 4 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>

      <div id="indexCaracteristicas" class="row">
        <div class="col-md-10">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Borde</a></li>
              <li><a href="#tab_2" data-toggle="tab">Consistencia</a></li>
              <li><a href="#tab_3" data-toggle="tab">Detalle Óptico</a></li>
              <li><a href="#tab_4" data-toggle="tab">Elevación</a></li>
              <li><a href="#tab_5" data-toggle="tab">Forma</a></li>
              <li><a href="#tab_6" data-toggle="tab">Superficie</a></li>
              <li><a href="#tab_7" data-toggle="tab">Género</a></li>
              <li><a href="#tab_8" data-toggle="tab">Especie</a></li>
              <li><a href="#tab_9" data-toggle="tab">Grupo Microbiano</a></li>
              <li><a href="#tab_10" data-toggle="tab">Origen Cepas</a></li>
              <li><a href="#tab_11" data-toggle="tab">Medio</a></li>
             
              
            </ul>
            
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                @include('admin.caracteristicas.borde.indexBorde')
              
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                 @include('admin.caracteristicas.consistencia.indexConsistencia')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                 @include('admin.caracteristicas.detalle_optico.indexDetalleoptico')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                 @include('admin.caracteristicas.elevacion.indexElevacion')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_5">
                 @include('admin.caracteristicas.forma.indexForma')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_6">
                 @include('admin.caracteristicas.superficie.indexSuperficie')
              </div>
              <div class="tab-pane" id="tab_7">
                 @include('admin.caracteristicas.genero.indexGenero')
              </div>
              <div class="tab-pane" id="tab_8">
                 @include('admin.caracteristicas.especie.indexEspecie')
              </div>
              <div class="tab-pane" id="tab_9">
                 @include('admin.caracteristicas.grupo_microbiano.indexGrupomicrobiano')
              </div>
              <div class="tab-pane" id="tab_10">
                 @include('admin.caracteristicas.origen.indexOrigen')
              </div>
              <div class="tab-pane" id="tab_11">
                 @include('admin.caracteristicas.medio.indexMedio')
              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->





      <!--------------------------
        | Your Page Content Here |
        -------------------------->



    </section>
    <!-- /.content -->
  </div>
  @endsection