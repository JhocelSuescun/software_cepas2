 @extends('usuariofinal.noticia.base')
@section('action-contentuser')
    <!-- Main content -->
    <div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: 3px solid #aa1916;">
            <!--            <h1 class="pull-left text-parallax capa-image2" style="background-color: #aa1916;color: #fff; margin-top: 0px; margin-bottom: 0px; padding: 6px; padding-left: 15px; padding-right: 15px;">-->
            <div class="row">
                <div class="col-md-10">
                                        <h1 class="pull-left" style="font-size: 36px;">
                        <b>Noticia</b></h1>
                </div>
                
            </div>
        </div>


<div class="container content profile">
    <div class="row">
        <div  class="col-md-9 col-sm-8 mb-margin-bottom-30">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h1 style="color:#555;">{{$noticia->descripcion }}</h1></div>
                </div>

                <div class="col-md-10">
                  <img src="../../{{$noticia->imagen }}"width="80%" height="80%" />

                </div>

                <div class="col-md-12">
                    
                    <div class="text-left">
<h5 class="parrafo_noticia"><p>{!!$noticia->informacion !!}</p>
</h5>
                                            </div>

</div>
</div>
</div>
</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: 3px solid #aa1916;">
</div>
<ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active"><h3>Otras noticias<h3></li>
      </ol>
<ul>
@foreach ($noticias as $noticia)
  <?php
    if($noticia->informacion!=null){
  ?>
  <li><a href="{{ url('/noticia/consultar', ['id' => $noticia->id]) }}"  style="text-align: center;">{{$noticia->descripcion}}</a></li>
  <?php
  }
  ?>
@endforeach


</ul>

  <div class="row">
        
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $noticias->links() }}
          </div>
        </div>
      </div>









@endsection



