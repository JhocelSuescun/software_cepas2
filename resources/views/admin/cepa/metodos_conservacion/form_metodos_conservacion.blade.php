@extends('layouts.template2')
@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <form method="post" class="form-horizontal" role="form" method="POST" action="{{ route('evento.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                                
                        <div class="card-header card-header-text" data-background-color="green">
                            <h4 class="card-title">Registro Método Conservación {{$codigo_bacteria}}</h4>
                            <p class="category">Fecha: {{$fecha}}</p>
                        </div>
                        <div class="card-content">
                            <input type="hidden" class="form-control" name="id_bacteria" value="{{ $id_bacteria }}">
                            <input type="hidden" class="form-control" name="start" value="{{ $fecha }}">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card">
                                      <div class="card-header">
                                          <h4 class="card-title">Solución Salina</h4>
                                      </div>
                                      <div class="card-body">
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Número Réplicas</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="replicas_solucion_salina" name="replicas_solucion_salina">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Recuento</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="recuento_solucion_salina" name="recuento_solucion_salina">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Microgota</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="microgota_solucion_salina" name="microgota_solucion_salina">
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="card">
                                      <div class="card-header">
                                          <h4 class="card-title">Glicerol</h4>
                                      </div>
                                      <div class="card-body">
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Número Réplicas</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="replicas_glicerol" name="replicas_glicerol">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Recuento</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="recuento_glicerol" name="recuento_glicerol">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Microgota</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="microgota_glicerol" name="microgota_glicerol">
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="card">
                                      <div class="card-header">
                                          <h4 class="card-title">Suelo</h4>
                                      </div>
                                      <div class="card-body">
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Número Réplicas</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="replicas_suelo" name="replicas_suelo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Recuento</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="recuento_suelo" name="recuento_suelo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Microgota</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="microgota_suelo" name="microgota_suelo">
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                  </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                      <div class="card-header">
                                          <h4 class="card-title">Agar</h4>
                                      </div>
                                      <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="card">
                                                      <div class="card-header">
                                                          <h4 class="card-title">Semisólido</h4>
                                                      </div>
                                                      <div class="card-body">
                                                            <div class="row">
                                                                <label class="col-md-3 label-on-left">Número Réplicas</label>
                                                                <div class="col-md-9">
                                                                    <div class="form-group label-floating is-empty">
                                                                        <label class="control-label"></label>
                                                                        <input type="text" class="form-control" id="replicas_semisolido" name="replicas_semisolido">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-md-3 label-on-left">Recuento</label>
                                                                <div class="col-md-9">
                                                                    <div class="form-group label-floating is-empty">
                                                                        <label class="control-label"></label>
                                                                        <input type="text" class="form-control" id="recuento_semisolido" name="recuento_semisolido">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="card">
                                                      <div class="card-header">
                                                          <h4 class="card-title">Solido-Caja</h4>
                                                      </div>
                                                      <div class="card-body">
                                                            <div class="row">
                                                                <label class="col-md-3 label-on-left">Número Réplicas</label>
                                                                <div class="col-md-9">
                                                                    <div class="form-group label-floating is-empty">
                                                                        <label class="control-label"></label>
                                                                        <input type="text" class="form-control" id="replicas_caja" name="replicas_caja">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-md-3 label-on-left">Recuento</label>
                                                                <div class="col-md-9">
                                                                    <div class="form-group label-floating is-empty">
                                                                        <label class="control-label"></label>
                                                                        <input type="text" class="form-control" id="recuento_caja" name="recuento_caja">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                  </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="card">
                                                      <div class="card-header">
                                                          <h4 class="card-title">Sólido-Tubo</h4>
                                                      </div>
                                                      <div class="card-body">
                                                            <div class="row">
                                                                <label class="col-md-3 label-on-left">Número Réplicas</label>
                                                                <div class="col-md-9">
                                                                    <div class="form-group label-floating is-empty">
                                                                        <label class="control-label"></label>
                                                                        <input type="text" class="form-control" id="replicas_tubo" name="replicas_tubo">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-md-3 label-on-left">Recuento</label>
                                                                <div class="col-md-9">
                                                                    <div class="form-group label-floating is-empty">
                                                                        <label class="control-label"></label>
                                                                        <input type="text" class="form-control" id="recuento_tubo" name="recuento_tubo">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                  </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card">
                                      <div class="card-header">
                                          <h4 class="card-title">Caldo</h4>
                                      </div>
                                      <div class="card-body">
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Número Réplicas</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="replicas_caldo" name="replicas_caldo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Recuento</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="recuento_caldo" name="recuento_caldo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-3 label-on-left">Microgota</label>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" id="microgota_caldo" name="microgota_caldo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer justify-content-center ">
                            <button type='submit' class='btn btn-primary'>Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>                    
    </div>
</div>


@endsection