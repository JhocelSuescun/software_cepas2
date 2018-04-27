@extends('layouts.template2')
@section('content')
<div class="content">
    <div class="container-fluid">


      
      <div class="col-sm-8 col-sm-offset-2">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="green" id="wizardProfile">
                                <form id="form_identificacionmolecular" class="form-horizontal" role="form" method="POST" action="{{ route('identificacion_molecular.store') }}" enctype="multipart/form-data">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    {{ csrf_field() }}
                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                           Registro Identificación Molecular
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
                                             <input type="hidden" class="form-control" name="id" value="{{ $im->id }}"></td></td>
                                             <input type="hidden" class="form-control" name="id_cepa" value="{{ $im->id_cepa }}"></td></td>
                                           
                                             

                                            <table>
                                              <tr>
                                                <td><strong>Informe de la Secuenciación: </strong></td>
                                                <td><textarea  rows="5" type="text" class="form-control" name="informe_secuenciacion">
                                                  <?php echo $im["informe_secuenciacion"] ?></textarea></td>
                                                <td><strong>Porcentaje Similitud: </strong></td>
                                                <td><input type="text" class="form-control" name="porcentaje_similitud" value="{{ $im->porcentaje_similitud }}"></td></td>
                                              </tr>
                                              <tr>
                                                <td><strong>Fecha Accesión: </strong></td>
                                                <td><input type="date" class="form-control" name="fecha_accesion" value="{{ $im->fechaaccesion }}"></td></td>
                                              </tr>
                                              <tr>
                                                
                                                <td><strong>Método de Conservación</strong></td>
                                                <td class="col-md-4"><strong>Número de Repeticiones</strong></td>
                                                <td class="col-md-4"><strong>Observaciones</strong></td>

                                              </tr>
                                              <tr>
                                                <td>Viales con Solución Salina</td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="repeticiones_solucion_salina" value="{{ $im->rep_solu_salina }}"></td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="observaciones_solucion_salina" value="{{ $im->obs_solu_salina }}"></td>
                                              </tr>
                                              <tr>
                                                <td>Tubos en agar inclinado</td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="repeticiones_tubos_agar" value="{{ $im->rep_tub_agar }}"></td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="observaciones_tubos_agar" value="{{ $im->obs_tub_agar }}"></td>
                                              </tr>
                                              <tr>
                                                <td>Viales con Suelo Estéril</td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="repeticiones_viales_suelo" value="{{ $im->rep_suelo_esteril }}"></td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="observaciones_viales_suelo" value="{{ $im->obs_suelo_esteril }}"></td>
                                              </tr>
                                              <tr>
                                                <td>Cultivo en caja con agar</td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="repeticiones_caja_agar" value="{{ $im->rep_cult_agar }}"></td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="observaciones_caja_agar" value="{{ $im->obs_cult_agar }}"></td>
                                              </tr>
                                              <tr>
                                                <td>Glicerol -50°C</td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="repeticiones_glicerol" value="{{ $im->rep_glicerol }}"></td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="observaciones_glicerol" value="{{ $im->obs_glicerol }}"></td>
                                              </tr>
                                              <tr>
                                                <td>Papel Filtro</td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="repeticiones_papel_filtro" value="{{ $im->rep_papel_filtro }}"></td>
                                                <td class="col-md-4"><input type="text" class="form-control" name="observaciones_papel_filtro" value="{{ $im->obs_papel_filtro }}"></td>
                                              </tr>


                                            </table>

                                            
                                       
                                        </div>
                                        
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <a class="btn btn-default" href="{{ url('cepa') }}" >Cancelar</a>
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