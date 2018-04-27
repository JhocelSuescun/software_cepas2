@extends('layouts.template2')
@section('content')
<div class="content">
    <div class="container-fluid">


      
      <div class="col-sm-8 col-sm-offset-2">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="green" id="wizardProfile">
                                <form id="form_editarProyecto" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                                            <input type="hidden" name="id" value="{{$proyecto->id}}">
                                             <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Nombre Proyecto: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="nombre_proyecto" value="{{$proyecto->nombre_proyecto}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Estado: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_estadoproyecto" name="estado">
                                                                  <option value="0" disabled>Seleccione un estado...</option>
                                                                  <?php
                                                                    if(strcmp($proyecto->estado,"Terminado")==0){
                                                                  ?>
                                                                  <option value="En desarrollo">En desarrollo</option>
                                                                  <option value="Terminado" selected>Terminado</option>
                                                                  <?php
                                                                    }else{
                                                                  ?>
                                                                  <option value="En desarrollo" selected>En desarrollo</option>
                                                                  <option value="Terminado">Terminado</option>
                                                                  <?php
                                                                   } 
                                                                  ?>
                                                          </select>
                                                          
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Cepas asociadas: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <select class="select_cepa" id="select_cepa" name="cepas" multiple="multiple">
                                                            <?php
                                                                $contador=0;
                                                            ?>
                                                            @foreach ($cepas as $cep)A000 A001 B005
                                                                @foreach ($cepas_asociadas as $ca) A000 B005
                                                                    <?php
                                                                    if($ca == $cep->codigo){
                                                                    ?>
                                                                    <option value="{{$cep->id}}" selected>{{$cep->codigo}}</option>

                                                                    <?php
                                                                        break;
                                                                    }else{
                                                                        $contador++;
                                                                    }
                                                                    ?>

                                                                  
                                                                @endforeach
                                                                <?php
                                                                if($contador==count($cepas_asociadas)){
                                                                    $contador=0;
                                                                ?> 
                                                                 <option value="{{$cep->id}}">{{$cep->codigo}}</option>
                                                                <?php  
                                                                }
                                                                ?>
                                                            @endforeach

                                                        </select>
                                                        <input type="hidden" id="cepas_asociadas" name="cepas_asociadas">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Nombre Aislador: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="nombre_aislador" value="{{$proyecto->nombre_aislador}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Fecha Aislamiento: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="date" class="form-control" name="fecha_aislamiento" value="{{$proyecto->fecha_aislamiento}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Lugar Aislamiento: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="lugar_aislamiento" value="{{$proyecto->lugar_aislamiento}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Publicar: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                      <?php
                                                        if($proyecto->publicado==1){
                                                      ?>
                                                         <input type="checkbox" id="publicado" name="publicado" checked>
                                                      <?php
                                                      }else{
                                                      ?>
                                                        <input type="checkbox" id="publicado" name="publicado">
                                                      <?php
                                                      }
                                                      ?>
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