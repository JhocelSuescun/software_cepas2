@extends('layouts.template2')
@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Registro Características Microscópicas {{$codigo_cepa}}</h4>
                        <form id="form_caracteristicas_microscopicas" class="form-horizontal" role="form" method="POST" action="{{ route('caracteristicas_microscopicas.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" name="id" value="{{ $cmi->id }}">
                            <input type="hidden" class="form-control" name="id_cepa" value="{{ $cmi->id_cepa }}">
                                       
                            <div class="row">
                                            <label class="col-sm-2 label-on-left">Forma</label>
                                            <div class="col-sm-10">
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->forma) && (strcmp("coco",$cmi->forma)==0))
                                                            <input type="radio" name="forma" value="coco" checked="true">Coco 
                                                        @else
                                                        <input type="radio" name="forma" value="coco">Coco 
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->forma) && (strcmp("cocobacilo",$cmi->forma)==0))
                                                        <input type="radio" name="forma" value="cocobacilo" checked="true"> Cocobacilo
                                                        @else
                                                        <input type="radio" name="forma" value="cocobacilo"> Cocobacilo
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->forma) && (strcmp("bacilo",$cmi->forma)==0))
                                                        <input type="radio" name="forma" value="bacilo" checked="true"> Bacilo
                                                        @else
                                                        <input type="radio" name="forma" value="bacilo"> Bacilo
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Ordenamiento</label>
                                            <div class="col-sm-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="ordenamiento" class="form-control" value="{{ $cmi->ordenamiento }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Tinción de Gram</label>
                                            <div class="col-sm-10">
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->tincion_gram) && (strcmp("positivo",$cmi->tincion_gram)==0))
                                                        <input type="radio" name="tincion_gram" value="positivo" checked="true">Gram Positivo
                                                        @else
                                                        <input type="radio" name="tincion_gram" value="positivo">Gram Positivo
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->tincion_gram) && (strcmp("negativo",$cmi->tincion_gram)==0))
                                                        <input type="radio" name="tincion_gram" value="negativo" checked="true"> Gram Negativo
                                                        @else
                                                        <input type="radio" name="tincion_gram" value="negativo"> Gram Negativo
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Tinción de Esporas</label>
                                            <div class="col-sm-10">
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->estado_tincion_esporas) && (strcmp("presencia",$cmi->estado_tincion_esporas)==0))
                                                        <input type="radio" name="estado_tincion_esporas" value="presencia" onclick="mostrar('ubicacion_espora')" checked="true">Presencia 
                                                        @else
                                                        <input type="radio" name="estado_tincion_esporas" onclick="mostrar('ubicacion_espora')" value="presencia">Presencia 
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->estado_tincion_esporas) && (strcmp("ausencia",$cmi->estado_tincion_esporas)==0))
                                                        <input type="radio" name="estado_tincion_esporas" value="ausencia" onclick="ocultar('ubicacion_espora'); quitarCheckRadio('opcion_ubicacion')" checked="true"> Ausencia
                                                        @else
                                                        <input type="radio" name="estado_tincion_esporas" onclick="ocultar('ubicacion_espora'); quitarCheckRadio('opcion_ubicacion')" value="ausencia"> Ausencia
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div> 
                                        @if(!is_null($cmi->ubicacion_esporas) && (strcmp("",$cmi->ubicacion_esporas)!=0))
                                        <div class="row" id="ubicacion_espora">
                                            <label class="col-sm-2 label-on-left">Ubicación de Espora</label>
                                            <div class="col-sm-10">
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->ubicacion_esporas) && (strcmp("central",$cmi->ubicacion_esporas)==0))
                                                        <input type="radio" class="opcion_ubicacion" name="ubicacion_esporas" id="ubicacion1" value="central" checked="true">central 
                                                        @else
                                                        <input type="radio" class="opcion_ubicacion" name="ubicacion_esporas" id="ubicacion1" value="central">central 
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->ubicacion_esporas) && (strcmp("subterminal",$cmi->ubicacion_esporas))==0)
                                                        <input type="radio" class="opcion_ubicacion" name="ubicacion_esporas" id="ubicacion2" value="subterminal" checked="true"> subterminal
                                                        @else
                                                        <input type="radio" class="opcion_ubicacion" name="ubicacion_esporas" id="ubicacion2" value="subterminal"> subterminal
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->ubicacion_esporas) && (strcmp("terminal",$cmi->ubicacion_esporas)==0))
                                                        <input type="radio" class="opcion_ubicacion" name="ubicacion_esporas" id="ubicacion3" value="terminal" checked="true"> terminal
                                                        @else
                                                        <input type="radio" class="opcion_ubicacion" name="ubicacion_esporas" id="ubicacion3" value="terminal"> terminal
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div style="display:none;" class="row" id="ubicacion_espora">
                                            <label class="col-sm-2 label-on-left">Ubicación de Espora</label>
                                            <div class="col-sm-10">
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        <input type="radio" class="opcion_ubicacion" name="ubicacion_esporas" id="ubicacion1" value="central">central 
                                                    </label>
                                                </div>
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        <input type="radio" class="opcion_ubicacion" name="ubicacion_esporas" id="ubicacion2" value="subterminal"> subterminal
                                                    </label>
                                                </div>
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        <input type="radio" class="opcion_ubicacion" name="ubicacion_esporas" id="ubicacion3" value="terminal"> terminal
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Tinción de Cápsula</label>
                                            <div class="col-sm-10">
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->tincion_capsula) && (strcmp("presencia",$cmi->tincion_capsula)==0))
                                                        <input type="radio" name="tincion_capsula" value="presencia" checked="true">Presencia 
                                                        @else
                                                        <input type="radio" name="tincion_capsula" value="presencia">Presencia 
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="radio checkbox-inline">
                                                    <label>
                                                        @if(!is_null($cmi->tincion_capsula) && (strcmp("ausencia",$cmi->tincion_capsula)==0))
                                                        <input type="radio" name="tincion_capsula" value="ausencia" checked="true"> Ausencia
                                                        @else
                                                        <input type="radio" name="tincion_capsula" value="ausencia"> Ausencia
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Otras Características</label>
                                            <div class="col-sm-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="otras_caracteristicas" class="form-control" value="{{ $cmi->otras_caracteristicas }}">
                                                </div>
                                            </div>
                                        </div>
                            
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>


@endsection