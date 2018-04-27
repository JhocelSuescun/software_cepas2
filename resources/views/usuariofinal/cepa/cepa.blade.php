 @extends('usuariofinal.cepa.base')
@section('action-contentuser')

 
    <!-- Main content -->
    
 <div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: 3px solid #aa1916;">
            <!--            <h1 class="pull-left text-parallax capa-image2" style="background-color: #aa1916;color: #fff; margin-top: 0px; margin-bottom: 0px; padding: 6px; padding-left: 15px; padding-right: 15px;">-->
            <div class="row">
                <div class="col-md-10">
                                        <h1 class="pull-left" style="font-size: 36px;">
                        <b>Cepas</b></h1>
                </div>
                
            </div>
        </div>
        <br>

<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example" class="row-border" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th>Codigo</th>
                <th>Grupo Microbiano</th>
                <th>Genero</th>
                <th>Especie</th>
                <th>Consultar</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($cepas as $cep)
                <tr role="row" class="odd">
                   <td class="sorting_1">{{ $cep->codigo }}</td>
                   <td>{{ $cep->grupomicrobiano }}</td>
                  <td>{{ $cep->genero }}</td>
                  <td>{{ $cep->especie }}</td>
                  <td> <a href="{{ url('/cepa/consultar', ['id' => $cep->id]) }}" class="btn btn-warning">
                        Detalles
                        </a></td>
                </tr>
                @endforeach
         </tbody>


        </table>
        
       
      </div>
    </div>
  </div>





@endsection



