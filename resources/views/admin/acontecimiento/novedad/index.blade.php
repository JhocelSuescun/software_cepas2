@extends('layouts.template2')
@section('content')

<div class="content">
                <div class="container-fluid">
                  <div class="col-md-12">
    


        <div class="card">

        <div class="card-header card-header-text" data-background-color="purple">
            <h4 class="card-title">Novedades Registradas</h4>
            
        </div>
        <div class="card-content">
          <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('novedades.create') }}">Añadir Novedad</a>
         
        </div>
            <div id="tableNoticia_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
                <div class="col-sm-12">
                  <table id="tableNovedad" class="row-border" role="grid" aria-describedby="tableNoticia_info">
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

<div class="content">
                <div class="container-fluid">
                    
                  <textarea id="mytextarea">Next, start a free trial!</textarea> 
                
                    Input
                    <input type="file" id="file" multiple/>
                    
                <div class="card wizard-card" data-color="rose" id="wizardProfile">
                    <form action="" method="" novalidate="novalidate" class="ng-untouched ng-pristine ng-valid">
                        
                        <div class="wizard-header">
                            <h3 class="wizard-title">
                                Build Your Profile
                            </h3>
                            <h5>This information will let us know more about you.</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="active" style="width: 33.3333%;">
                                    <a data-toggle="tab" href="#about" aria-expanded="true">About</a>
                                </li>
                                <li style="width: 33.3333%;">
                                    <a data-toggle="tab" href="#account">Account</a>
                                </li>
                                <li style="width: 33.3333%;">
                                    <a data-toggle="tab" href="#address">Address</a>
                                </li>
                            </ul>
                        <div class="moving-tab" style="width: 62.6667px; transform: translate3d(-8px, 0px, 0px); transition: transform 0s;">About</div></div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="about">
                                <div class="row">
                                    <h4 class="info-text"> Let's start with the basic information (with validation)</h4>
                                    <div class="col-sm-4 col-sm-offset-1">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img class="picture-src" id="wizardPicturePreview" src="../../assets/img/default-avatar.png" title="">
                                                <input id="wizard-picture" type="file">
                                            </div>
                                            <h6>Choose Picture</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">First Name
                                                    <small>(required)</small>
                                                </label>
                                                <input class="form-control" name="firstname" type="text">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">record_voice_over</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Last Name
                                                    <small>(required)</small>
                                                </label>
                                                <input class="form-control" name="lastname" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Email
                                                    <small>(required)</small>
                                                </label>
                                                <input class="form-control" name="email" type="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> What are you doing? (checkboxes) </h4>
                                <div class="row">
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input name="jobb" type="checkbox" value="Design">
                                                <div class="icon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <h6>Design</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input name="jobb" type="checkbox" value="Code">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Code</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input name="jobb" type="checkbox" value="Develop">
                                                <div class="icon">
                                                    <i class="fa fa-laptop"></i>
                                                </div>
                                                <h6>Develop</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Are you living in a nice area? </h4>
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Street Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Street No.</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">City</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Country</label>
                                            <select class="form-control" name="country">
                                                <option disabled="" selected=""></option>
                                                <option value="Afghanistan"> Afghanistan </option>
                                                <option value="Albania"> Albania </option>
                                                <option value="Algeria"> Algeria </option>
                                                <option value="American Samoa"> American Samoa </option>
                                                <option value="Andorra"> Andorra </option>
                                                <option value="Angola"> Angola </option>
                                                <option value="Anguilla"> Anguilla </option>
                                                <option value="Antarctica"> Antarctica </option>
                                                <option value="...">...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input class="btn btn-next btn-fill btn-rose btn-wd" name="next" type="button" value="Next">
                                <input class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" type="button" value="Finish" style="display: none;">
                            </div>
                            <div class="pull-left">
                                <input class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" type="button" value="Previous">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            
                </div>
</div>

@endsection 
