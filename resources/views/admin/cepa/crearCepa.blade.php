@extends('layouts.template2')
@section('content')
<div class="content">
    <div class="container-fluid">


      
      <div class="col-sm-8 col-sm-offset-2">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="green" id="wizardProfile">
                                <form id="form_cepa" class="form-horizontal" role="form" method="POST" action="{{ route('cepa.store') }}" enctype="multipart/form-data">
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
                                            <li>
                                                <a href="#account" data-toggle="tab">Caracteristicas Microscópicas(100X)</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="about">
                                             <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Código: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="codigo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Estado: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_estadocepa" name="estado">
                                                                  <option value="0" disabled selected>Seleccione un estado...</option>
                                                                  <option value="Viable">Viable</option>
                                                                  <option value="No Viable">No Viable</option>
                                                          </select>
                                                          
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Género: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_genero2" name="genero">
                                                                  <option value="" disabled selected>Seleccione un género...</option>
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalGenero" href="#">Añadir Género</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Especie: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_especie" name="especie">
                                                                  <option value="0" disabled selected>Seleccione una especie...</option>
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalEspecie" href="#">Añadir Especie</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Grupo Microbiano: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_grupo" name="grupo_microbiano">
                                                                  <option value="" disabled selected>Seleccione un grupo microbiano...</option>
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalGrupoMicrobiano" href="#">Añadir Grupo Microbiano</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Origen: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_origen" name="origen">
                                                                  <option value="" disabled selected>Seleccione un origen...</option>
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalOrigen" href="#">Añadir Origen</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="account">
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Morfología: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="morfologia">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Tinción Gram: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="tincion_gram">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Motilidad: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="motilidad">
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
                                            <a class="btn btn-default" href="{{ url('cepa') }}">Cancelar</a>
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
                    @include('admin.caracteristicas.genero.formularioGenero')
                    @include('admin.caracteristicas.especie.formularioEspecie')
                    @include('admin.caracteristicas.grupo_microbiano.formularioGrupomicrobiano')
                    @include('admin.caracteristicas.origen.formularioOrigen')

    </div>
</div>


@endsection