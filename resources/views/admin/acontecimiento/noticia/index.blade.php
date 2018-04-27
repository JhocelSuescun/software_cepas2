@extends('layouts.template2')
@section('content')

<div class="content">
                <div class="container-fluid">
                  <div class="col-md-12">
    


        <div class="card">

        <div class="card-header card-header-text" data-background-color="purple">
            <h4 class="card-title">Noticias Registradas</h4>
            
        </div>
        <div class="card-content">
          <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('noticias.create') }}">Añadir Noticia</a>
         
        </div>
            <div id="tableNoticia_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
                <div class="col-sm-12">
                  <table id="tableNoticia" class="row-border" role="grid" aria-describedby="tableNoticia_info">
                    <thead>
                      <tr role="row">
                        <th>Imagen</th>
                        <th>Fecha</th>
                        <th>Titulo</th>
                        <th>Publicado</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    
                    <tfoot>
                      <tr>
                        <tr role="row">
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableNoticia" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Imagen</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableNoticia" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Fecha</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableNoticia" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Titulo</th>
                        <th  width="15%" class="sorting_asc" tabindex="0" aria-controls="tableNoticia" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Publicado</th>
                        <th width="10%" tabindex="0" aria-controls="tableNoticia" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acción</th>
                      </tr>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
          </div>

        </div>
    </div>


</div>


</div>
</div>


@endsection 
