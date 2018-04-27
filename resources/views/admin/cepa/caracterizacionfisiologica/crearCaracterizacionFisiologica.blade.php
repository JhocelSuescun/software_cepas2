@extends('layouts.template2')
@section('content')
<div class="content">
    <div class="container-fluid">


      
      <div class="col-sm-8 col-sm-offset-2">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="green" id="wizardProfile">
                                <form id="form_caracterizacionfisiologica" class="form-horizontal" role="form" method="POST" action="{{ route('caracterizacion_fisiologica.store') }}" enctype="multipart/form-data">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    {{ csrf_field() }}
                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                           Registro Medio Selectivo
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
                                             
                                            <input type="hidden" id="id_cepa" name="id_cepa" value={{$id_cepa}}>
                                                                      
                                             <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-6 label-on-left">Fecha: </label>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="date" class="form-control" name="fecha">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-6 label-on-left">Ácido Indolacético (Compuestos Indólicos ) (µg mL^-1): </label>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="acido_indolacetico">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-6 label-on-left">Solubilización de fosfatos (P disponible) (µg mL^-1 ): </label>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="solubilizacion_fosfatos">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-6 label-on-left">Producción Sideróforos (µg mL^-1 ): </label>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="produccion_sideroforos">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-6 label-on-left">Fijación Biológica de Nitrógeno (N Total por MicroKjeldahl) (µg mL^-1 ): </label>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="fijacion_nitrogeno">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-6 label-on-left">Ácido salicílico (µg mL^-1 ): </label>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="acido_salicilico">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-6 label-on-left">Actividad enzimática Quitina (AE): </label>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="actividad_enzimatica">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                       
                                        </div>
                                        
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">

                                            <a class="btn btn-default" href="{{ url('cepa') }}" >Cepas Registradas</a>
                                            <a class="btn btn-default" href="{{ route('caracterizacion_fisiologica.mostrar', ['id' => $id_cepa]) }}">Cancelar</a>
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