 @extends('usuariofinal.investigador.base')
@section('action-contentuser')
    <!-- Main content -->
    
 <div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: 3px solid #aa1916;">
            <!--            <h1 class="pull-left text-parallax capa-image2" style="background-color: #aa1916;color: #fff; margin-top: 0px; margin-bottom: 0px; padding: 6px; padding-left: 15px; padding-right: 15px;">-->
            <div class="row">
                <div class="col-md-10">
                                        <h1 class="pull-left" style="font-size: 36px;">
                        <b>Investigadores</b></h1>
                </div>
                
            </div>
        </div>

 
 <hr>


   <div class="container content profile">
    <div class="row">
        <div>
            <div class="row">
             
                    @foreach ($investigador as $inv)
             <div class="info">
                          
             <img class="foto" src="{{$inv->imagen }}" width="30%" height="30%"/>
                          
                             
                            
                        
                   
                        <div class="form-group">
                            <label  class="datos"><strong>Nombre: {{ $inv->nombres }} {{ $inv->apellidos }}</strong></label>
                        
                        </div>

                        

                        <div class="form-group">
                            <label  class="datos"><strong>Email: {{ $inv->email }}</strong></label>
                            
                        </div>

                        
                        <div class="form-group">
                            <label  class="datos"><strong>Url-CVLAC: {{ $inv->url_cvlac }}</strong></label>
                            
                            
                        </div>

                      </div>

            @endforeach



            

    </div>
    </div>
    </div>
    </div>
  
    <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $investigador->links() }}
          </div>
        </div>
      </div>
@endsection



