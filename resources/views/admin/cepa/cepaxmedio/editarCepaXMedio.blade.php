@extends('layouts.template2')
@section('content')
<div class="content">
    <div class="container-fluid">


      
      <div class="col-sm-8 col-sm-offset-2">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="green" id="wizardProfile">
                                <form id="form_editarCepaXMedio" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                                                <a href="#about" data-toggle="tab">Detalles Cepa: {{$codigo_cepa}}</a>
                                            </li>
                                            
                                            
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="about">
                                            <input type="text" id="id" name="id" value={{$cxm->id}}>
                                            <input type="text" id="id_cepa" name="id_cepa" value={{$cxm->id_cepa}}>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Medio Selectivo: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_medio" name="medio">
                                                                  <option value="" disabled selected>Seleccione un medio...</option>
                                                                @foreach ($medio as $med)
                                                                  <option {{$cxm->id_medio == $med->id ? 'selected' : ''}} value="{{$med->id}}">{{$med->medio}}</option>
                                                                @endforeach
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalMedio" href="#">Añadir Medio</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Borde: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_borde" name="borde">
                                                                  <option value="" disabled selected>Seleccione un borde...</option>
                                                                @foreach ($borde as $bor)
                                                                  <option {{$cxm->id_borde == $bor->id ? 'selected' : ''}} value="{{$bor->id}}">{{$bor->borde}}</option>
                                                                @endforeach
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalBorde" href="#">Añadir Borde</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Consistencia: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_consistencia" name="consistencia">
                                                                  <option value="" disabled selected>Seleccione una consistencia...</option>
                                                                @foreach ($consistencia as $con)
                                                                  <option {{$cxm->id_consistencia == $con->id ? 'selected' : ''}} value="{{$con->id}}">{{$con->consistencia}}</option>
                                                                @endforeach
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalConsistencia" href="#">Añadir Consistencia</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Detalle Óptico: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_detalleoptico" name="detalle_optico">
                                                                  <option value="" disabled selected>Seleccione un detalle óptico...</option>
                                                                @foreach ($detalleoptico as $detop)
                                                                  <option {{$cxm->id_detalleoptico == $detop->id ? 'selected' : ''}} value="{{$detop->id}}">{{$detop->detalle_optico}}</option>
                                                                @endforeach
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalDetalleOptico" href="#">Añadir DetalleOptico</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Elevacion: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_elevacion" name="elevacion">
                                                                  <option value="" disabled selected>Seleccione una elevacion...</option>
                                                                @foreach ($elevacion as $ele)
                                                                  <option {{$cxm->id_elevacion == $ele->id ? 'selected' : ''}} value="{{$ele->id}}">{{$ele->elevacion}}</option>
                                                                @endforeach
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalElevacion" href="#">Añadir Elevacion</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Forma: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_forma" name="forma">
                                                                  <option value="" disabled selected>Seleccione una forma...</option>
                                                                @foreach ($forma as $for)
                                                                  <option {{$cxm->id_forma == $for->id ? 'selected' : ''}} value="{{$for->id}}">{{$for->forma}}</option>
                                                                @endforeach
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalForma" href="#">Añadir Forma</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Superficie: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                         <select id="select_superficie" name="superficie">
                                                                  <option value="" disabled selected>Seleccione una superficie...</option>
                                                                @foreach ($superficie as $sup)
                                                                  <option {{$cxm->id_superficie == $sup->id ? 'selected' : ''}} value="{{$sup->id}}">{{$sup->superficie}}</option>
                                                                @endforeach
                                                          </select>
                                                          <a data-toggle="modal" data-target="#modalSuperficie" href="#">Añadir Superficie</a>
                                                  
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                             <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Color: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="color" value="{{$cxm->color}}">
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-lg-10 col-lg-offset-1">
                                                <label class="col-sm-2 label-on-left">Otras Características: </label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="otras_caracteristicas" value="{{$cxm->otrasCaracteristicas}}">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                       
                                        </div>
                                        
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <a class="btn btn-default" href="{{ url('cepa') }}" >Cepas Registradas</a>
                                            <a class="btn btn-default" href="{{ route('medios_selectivos.mostrar', ['id' => $cxm->id_cepa]) }}">Cancelar</a>
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
                    @include('admin.caracteristicas.borde.formularioBorde')
                    @include('admin.caracteristicas.consistencia.formularioConsistencia')
                    @include('admin.caracteristicas.detalle_optico.formularioDetalleoptico')
                    @include('admin.caracteristicas.elevacion.formularioElevacion')
                    @include('admin.caracteristicas.forma.formularioForma')
                    @include('admin.caracteristicas.superficie.formularioSuperficie')
                    @include('admin.caracteristicas.medio.formularioMedio')



                    


    </div>
</div>


@endsection