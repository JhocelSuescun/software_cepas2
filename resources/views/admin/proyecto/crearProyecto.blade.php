@extends('layouts.template2')
@section('content')
<div class="content">
    <div class="container-fluid">


      
      <div class="col-sm-8 col-sm-offset-2">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="green" id="wizardProfile">
                                <form id="form_proyecto" class="form-horizontal" role="form" method="POST" action="{{ route('proyectos.store') }}" enctype="multipart/form-data">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    {{ csrf_field() }}
                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                           Registro Cepas
                                        </h3>
                                        
                                    </div>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li>
                                                <a href="#about" data-toggle="tab">Detalles</a>
                                            </li>
                                            
                                            
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="about">
                                             <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Nombre Proyecto: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="nombre_proyecto">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Estado: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_estadoproyecto" name="estado">
                                                                  <option value="0" disabled selected>Seleccione un estado...</option>
                                                                  <option value="En desarrollo">En desarrollo</option>
                                                                  <option value="Terminado">Terminado</option>
                                                          </select>
                                                          
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Cepas asociadas: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <select class="select_cepa" id="select_cepa" name="cepas" multiple="multiple"></select>
                                                        <a href="{{ route('cepa.create') }}">Registrar Cepa</a>
                                                        <input type="hidden" id="cepas_asociadas" name="cepas_asociadas">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Nombre Aislador: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="nombre_aislador">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Fecha Aislamiento: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="date" class="form-control" name="fecha_aislamiento">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Lugar Aislamiento: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="lugar_aislamiento">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Publicar: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <input type="checkbox" id="publicado" name="publicado" checked>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            
                                           
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <a class="btn btn-default" href="{{ url('proyectos') }}">Cancelar</a>
                                            <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                                            <input type='submit' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Registrar' />
                                        </div>
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- wizard container -->
                    </div>
                    

    </div>
</div>


@endsection