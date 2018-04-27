@extends('layouts.template2')
<style type="text/css">
.flex-caption {
  width: 96%;
  padding: 2%;
  left: 0;
  bottom: 0;
  background: rgba(0,0,0,.5);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0,0,0,.3);
  font-size: 14px;
  line-height: 18px;
}
.flexslider{
    width: 20%;

}
</style>
@section('content')

<div class="content">
                <div class="container-fluid">
                  <!--<div class="col-md-12">

                    <div class="flexslider">
                          <ul class="slides">
                            @foreach ($imagenes as $imagen)
                            <li>
                              <img src="{{$imagen->file_name}}" />
                              <p class="flex-caption">{{$imagen->description}}</p>
                            </li>
                            @endforeach
                          </ul>
                        </div>
    
                     <form action="{{ route('imagen.subir') }}" 
                      class="dropzone"
                      id="my-dropzone">
                      {{ csrf_field() }}
                    <div class="dz-message" style="height:200px;">
                        Subalos
                    </div>

                    <div class="dropzone-previews"></div>
                    <button type="submit" class="btn btn-success" id="submit">Save</button>
                    </form>
                    -->
        <div class="card">

        <div class="card-header card-header-text" data-background-color="green">
            <h4 class="card-title">Cepas Registradas</h4>
            
        </div>
        <div class="card-content">
          <div class="col-sm-4">
          <a class="btn btn-default" href="{{ route('cepa.create') }}">Añadir Cepa</a>
          @include('admin.cepa.modalInfoCepa')
         
        </div>



            <table id="tableCepa" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Codigo</th>
                        <th>Estado</th>
                        <th>Género</th>
                        <th>Especie</th>
                        <th>Grupo Microbiano</th>
                        <th>Origen</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th width="4%"></th>
                        <th  width="17%"  tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1">Codigo</th>
                        <th  width="17%"  tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Estado</th>
                        <th  width="17%"  tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Género</th>
                        <th  width="17%"  tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Especie</th>
                        <th  width="17%"  tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Grupo Microbiano</th>
                        <th  width="17%"  tabindex="0" aria-controls="tableCepa" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Origen</th>
                                           
                    </tr>
                </tfoot>
            </table>

          
        </div>
    </div>


</div>


</div>
</div>
@endsection