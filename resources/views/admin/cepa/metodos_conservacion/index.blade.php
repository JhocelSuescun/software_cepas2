
@extends('layouts.template2')
@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card card-calendar">
                  <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">layers</i>
                    </div>
                    
                    <div class="card-content" class="ps-child">
                      <h4 class="card-title">Métodos Conservación {{$codigo_cepa}}</h4>
                      <input type="hidden" id="id_cep" value="{{$id_cepa}}"> 
                        <div id="fullCalendar"></div>
                         
                       
                        @include('admin.cepa.metodos_conservacion.modal_metodos')
                        @include('admin.cepa.metodos_conservacion.modal_form')
                    </div>

                </div>
            </div>
        </div>
        

    </div>
</div>


@endsection
