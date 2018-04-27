 @extends('usuariofinal.proyecto.base')
@section('action-contentuser')

 
  



    <!-- Main content -->
    
 <div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: 3px solid #aa1916;">
            <!--            <h1 class="pull-left text-parallax capa-image2" style="background-color: #aa1916;color: #fff; margin-top: 0px; margin-bottom: 0px; padding: 6px; padding-left: 15px; padding-right: 15px;">-->
            <div class="row">
                <div class="col-md-10">
                                        <h1 class="pull-left" style="font-size: 36px;">
                        <b>Proyectos</b></h1>
                </div>
                
            </div>
        </div>
        <br>
       
<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

      <div class="row">
        <div class="col-sm-12">
           <h3>Inoculación Plantas del Proyecto: {{$proyecto}}</h3>
          <table id="example3" class="row-border" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th>Fecha</th>
                <th>Cultivo</th>
                <th>Rendimiento</th>
                <th>Peso Fresco Foliar</th>
                <th>Peso Seco Foliar</th>
                <th>Peso Fresco Radical</th>
                <th>Peso Seco Radical</th>
                <th>Altura Planta</th>
                <th>Longitud Planta</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($inoculacion as $in)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $in->fecha }}</td>
                   <td>{{ $in->cultivo }}</td>
                  <td>{{ $in->rendimiento }}</td>
                  <td>{{ $in->pesofrescofoliar }}</td>
                  <td>{{ $in->pesosecofoliar }}</td>
                  <td>{{ $in->pesofrescoradical }}</td>
                  <td>{{ $in->pesosecoradical }}</td>
                  <td>{{ $in->alturaplanta }}</td>
                  <td>{{ $in->longitudplanta }}</td>
                  
                </tr>
                @endforeach
         </tbody>


        </table>
        
       
      </div>
    </div>
  </div>


 

@endsection



