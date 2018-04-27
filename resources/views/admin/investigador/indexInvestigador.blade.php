@extends('layouts.template2')
@section('content')

<div class="content">
                <div class="container-fluid">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-text" data-background-color="purple">
                                <h4 class="card-title">Investigadores Registrados</h4>
                                
                            </div>
                            <div class="card-content">
                                <div class="col-sm-4">
                                    @include('admin.investigador.formularioInvestigador')
                             
                                </div>
                                <table id="tableInvestigador" class="row-border" role="grid" aria-describedby="tableBorde_info">
                                    <thead>
                                      <tr role="row">
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Codigo</th>
                                        <th>Email</th>
                                        <th>Url CVLAC</th>
                                        <th>Acción</th>
                                      </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                                        <tr role="row">
                                        <th width="30%" class="sorting_asc" tabindex="0" aria-controls="tableInvestigador" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nombres</th>
                                        <th width="30%" class="sorting_asc" tabindex="0" aria-controls="tableInvestigador" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Apellidos</th>
                                        <th width="30%" class="sorting_asc" tabindex="0" aria-controls="tableInvestigador" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Codigo</th>
                                        <th width="30%" class="sorting_asc" tabindex="0" aria-controls="tableInvestigador" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Email</th>
                                        <th width="30%" class="sorting_asc" tabindex="0" aria-controls="tableInvestigador" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Url CVLAC</th>
                                        <th width="20%" tabindex="0" aria-controls="tableInvestigador" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acción</th>
                                      </tr>
                                      </tr>
                                    </tfoot>
                                  </table>
                            </div>
                        </div>
                    </div>


                   
                     @foreach ($investigador as $inv)
                     
                   <div class="col-md-3">
                            <div class="card card-product">
                                <div class="card-image" data-header-animation="true">
                                    
                                        <img class="img" src="{{$inv->imagen }}">
                                 
                                </div>
                                <div class="card-content">
                                    <div class="card-actions">
                                         <div id="myLayer" data-role="page" data-id= "{{$inv->id }}" data-nombres ="{{$inv->nombres }}" 
                                            data-apellidos= "{{$inv->apellidos }}" data-codigo= "{{$inv->codigo }}"
                                            data-email= "{{$inv->email }}" data-url_cvlac= "{{$inv->url_cvlac }}"
                                            data-imagen= "{{$inv->imagen }}"></div>
                                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                            <i class="material-icons">build</i> Fix Header!
                                        </button>
                                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                                            <i class="material-icons">art_track</i>
                                        </button>
                                        <button type="button"  class="editarInvestigador btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" class="eliminarInvestigador btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </div>
                                    <h4 class="card-title">
                                        <a href="#pablo">{{$inv->nombres }} {{$inv->apellidos }}</a>
                                    </h4>
                                    <div class="card-description">
                                        <p>Codigo: {{$inv->codigo }}</p>
                                        <p>Email: {{$inv->email }}</p>
                                        <p>CVLAC: {{$inv->url_cvlac }}</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div> 
                         @endforeach
                          
                </div>
                <div class="row">
                            <div class="col-sm-5">
                              <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($investigador)}} of {{count($investigador)}} entries</div>
                            </div>
                            <div class="col-sm-7">
                              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                {{ $investigador->links() }}
                              </div>
                            </div>
                          </div>
</div>
@endsection