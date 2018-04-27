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
           <h3>Descripción Macroscópica y Microscópica</h3>
          <table id="example3" class="row-border" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th>Codigo</th>
                <th>Grupo Microbiano</th>
                <th>Genero</th>
                <th>Especie</th>
                <th>Morfología</th>
                <th>Tinción Gram</th>
                <th>Motilidad</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($cepa as $cep)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $cep->codigo }}</td>
                   <td>{{ $cep->grupomicrobiano }}</td>
                  <td>{{ $cep->genero }}</td>
                  <td>{{ $cep->especie }}</td>
                  <td>{{ $cep->morfologia }}</td>
                  <td>{{ $cep->tincion_gram }}</td>
                  <td>{{ $cep->motilidad }}</td>
                  
                </tr>
                @endforeach
         </tbody>


        </table>
        
       
      </div>
    </div>
  </div>

<?php
  if(count($cepaxmedio)>'0'){
?>
  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example4" class="row-border" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th>Medio</th>
                <th>Forma</th>
                <th>Consistencia</th>
                <th>Elevación</th>
                <th>Borde</th>
                <th>Detalle Óptico</th>
                <th>Superficie</th>
                <th>Color</th>

              </tr>
            </thead>
            <tbody>

            @foreach ($cepaxmedio as $cxm)
                <tr role="row" class="odd">
                   <td>{{ $cxm->medio }}</td>
                  <td>{{ $cxm->forma }}</td>
                  <td>{{ $cxm->consistencia }}</td>
                  <td>{{ $cxm->elevacion }}</td>
                  <td>{{ $cxm->borde }}</td>
                  <td>{{ $cxm->detalle }}</td>
                  <td>{{ $cxm->superficie }}</td>
                  <td>{{ $cxm->color }}</td>
                  
                </tr>
                @endforeach
         </tbody>


        </table>
        
       
      </div>
    </div>
  </div>

 <?php
}
if(count($identificacionmolecular)>'0'){
?>


  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
           <h3>Identificación Molecular</h3>
          <table id="example5" class="row-border" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="2%">Caracteristica</th>
                <th width="2%">Repeticiones</th>
                <th width="2%">Observaciones</th>
                

              </tr>
            </thead>
            <tbody>

            @foreach ($identificacionmolecular as $im)
                <tr role="row" class="odd">
                  <td>Solución Salina</td>
                   <td>{{ $im->rep_solu_salina }}</td>
                  <td>{{ $im->obs_solu_salina }}</td>
                  
                </tr>
                <tr role="row" class="odd">
                  <td>Tubos Agár</td>
                   <td>{{ $im->rep_tub_agar }}</td>
                  <td>{{ $im->obs_tub_agar }}</td>
                  
                </tr>
                <tr role="row" class="odd">
                  <td>Suelo Estéril</td>
                   <td>{{ $im->rep_suelo_esteril }}</td>
                  <td>{{ $im->obs_suelo_esteril }}</td>
                  
                </tr>
                <tr role="row" class="odd">
                  <td>Cultivo Agár</td>
                   <td>{{ $im->rep_cult_agar }}</td>
                  <td>{{ $im->obs_cult_agar }}</td>
                  
                </tr>
                <tr role="row" class="odd">
                  <td>Glicerol</td>
                   <td>{{ $im->rep_glicerol }}</td>
                  <td>{{ $im->obs_glicerol }}</td>
                  
                </tr>
                <tr role="row" class="odd">
                  <td>Papel Filtro</td>
                   <td>{{ $im->rep_papel_filtro }}</td>
                  <td>{{ $im->obs_papel_filtro }}</td>
                  
                </tr>
                @endforeach
         </tbody>
        

        </table>
        
       
      </div>
    </div>
  </div>

<?php
}
if(count($caracterizacionfisiologica)>'0'){
?>


  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
           <h3>Caracterización Fisiológica</h3>
          <table id="example6" class="row-border" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th>Fecha</th>
                <th>Ácido Indolacético</th>
                <th>Solubilización de Fosfatos</th>
                <th>Producción Sideróforos</th>
                <th>Fijación Nitrógeno</th>
                <th>Ácido Salicílico</th>
                <th>Actividad Enzimática</th>
                

              </tr>
            </thead>
            <tbody>

            @foreach ($caracterizacionfisiologica as $cf)
                <tr role="row" class="odd">
                 <td>{{ $cf->fecha }}</td>
                   <td>{{ $cf->acido_indolacetico }}</td>
                  <td>{{ $cf->solubilizacion_fosfatos }}</td>
                  <td>{{ $cf->produccion_sideroforos }}</td>
                   <td>{{ $cf->fijacion_nitrogeno }}</td>
                  <td>{{ $cf->acido_salicilico }}</td>
                  <td>{{ $cf->actividad_enzimatica }}</td>
                  
                </tr>
                
                @endforeach
         </tbody>
        

        </table>
        
       
      </div>
    </div>
  </div>

<?php
}
?>

<script type="text/javascript">

$.extend( true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false,
    "lengthMenu": false,
    "paginate": false,
    "info":false
} );
 
 
$(document).ready(function() {
    $('#example3').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });
} );
$(document).ready(function() {
    $('#example4').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        
    });
} );
$(document).ready(function() {
    $('#example5').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        
    });
} );
$(document).ready(function() {
    $('#example6').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        
    });
} );

</script>

@endsection



