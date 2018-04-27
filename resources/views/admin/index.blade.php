@extends('layouts.template2')
@section('content')

<div class="content">
    <div class="container-fluid">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <h2>Información Personal</h2>
                    <div class="col-md-4" id="algo">
                            <div class="card card-product">
                                <div class="card-image" data-header-animation="true">
                                    <a href="#pablo">
                                        <img class="img" src="{{Auth::user()->imagen}}">
                                    </a>
                                    
                                </div>
                                <div class="card-content">
                                    <div class="card-actions">
                                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                            <i class="material-icons">build</i> Reparar!
                                        </button>
                                        
                                        <button type="button" class="btn btn-warning btn-simple" rel="tooltip" data-placement="bottom" title="Editar" data-toggle="modal" data-target="#modalAdmin">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Cambiar Contraseña" data-toggle="modal" data-target="#modalContraseña">
                                            <i class="material-icons">lock</i>
                                        </button>
                                        
                                    </div>
                                    <h4 class="card-title">
                                        <a href="#pablo">Datos Personales</a>
                                    </h4>
                                    <div class="card-description">
                                       <div class="form-group">
                                            <label  class="car">Nombres: </label>
                                            <label  class="info">{{ Auth::user()->name}}</label>
                                        </div>
                                        <div class="form-group">
                                            <label  class="car">Email: </label>
                                            <label  class="info">{{ Auth::user()->email}}</label>
                                        </div>


                                        <div class="form-group">
                                            <label  class="car">Codigo: </label>
                                            <label  class="info">{{ Auth::user()->codigo}}</label>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="otro">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="{{ url('cepa') }}">
                                        <div class="card card-stats" id="tarjeta">
                                            <div class="card-header" data-background-color="orange">
                                                <i class="material-icons">bug_report</i>
                                            </div>
                                            <div class="card-content">
                                                <p class="category">Cepas</p>
                                            </div>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="{{ url('proyectos') }}">
                                        <div class="card card-stats" id="tarjeta">
                                            <div class="card-header" data-background-color="rose">
                                                <i class="material-icons">business</i>
                                            </div>
                                            <div class="card-content">
                                                <p class="category">Proyectos</p>
                                            </div>
                                            
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="{{ url('investigadores') }}">
                                        <div class="card card-stats" id="tarjeta">
                                            <div class="card-header" data-background-color="gray">
                                                <i class="material-icons">supervisor_account</i>
                                            </div>
                                            <div class="card-content">
                                                <p class="category">Investigadores</p>
                                            </div>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="{{ url('noticias') }}">
                                        <div class="card card-stats" id="tarjeta">
                                            <div class="card-header" data-background-color="green">
                                                <i class="material-icons">devices</i>
                                            </div>
                                            <div class="card-content">
                                                <p class="category">Noticias</p>
                                            </div>
                                            
                                        </div>
                                    </a>
                                </div>
                                
                                
                            </div>
                        </div>

        <!----------------------------------MODAL FORM INVESTIGADOR---------------------------------------->

                <div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Registro Administrador</h4>
                      </div>
                      <div class="modal-body">
                        <!--
                        <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div> -->

                        <form class="form-horizontal" id="form_admin" role="form" enctype="multipart/form-data">
                            
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <input type="hidden" name="id" value="{{ Auth::user()->id}}" id="id">
                            
                            <div class="form-group">
                                
                                <label  class="col-md-4 control-label">Nombres</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name}}" required autofocus>
                                   
                                </div>
                            </div>
                            
                            <div class="form-group">
                                
                                <label  class="col-md-4 control-label">Codigo</label>

                                <div class="col-md-6">
                                    <input id="codigo" type="text" class="form-control" name="codigo" value="{{ Auth::user()->codigo}}" required autofocus>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <label  class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->email}}"  required autofocus>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Imagen</label>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img id="imagen2" src="{{ Auth::user()->imagen}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input name="imagen" id="input_imagen_investigador" type="file">
                                        </span>
                                    <a href="#pablo" id="remove" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" id="añadirAdmin" class="btn btn-primary">Guardar</button>
                                    <button type="button" id="cancelarAdmin" class="btn btn-default">Cancelar</button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                        

    </div>
</div>
@endsection      


