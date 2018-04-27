@extends('layouts.template2')
@section('content')
<div class="content">
    <div class="container-fluid">


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Registro Características Bioquímicas {{$codigo_cepa}}</h4>
                                    <div class="table-responsive">
                                      <form id="form_caracteristicas_bioquimicas" class="form-horizontal" role="form" method="POST" action="{{ route('caracteristicas_bioquimicas.store') }}" enctype="multipart/form-data">
                                       {{ csrf_field() }}
                                      <input type="hidden" class="form-control" name="id" value="{{ $cb->id }}"></td></td>
                                      <input type="hidden" class="form-control" name="id_cepa" value="{{ $cb->id_cepa }}"></td></td>
                                           
                                        <table class="table">
                                           
                                            <tbody>
                                                <tr>
                                                    <td class="col-md-3">1. Oxidasa</td>
                                                    <td><input type="text" class="form-control" name="oxidasa" value="{{ $cb->oxidasa }}"></td>
                                                    <td class="col-md-3">15. Xilosa</td>
                                                    <td><input type="text" class="form-control" name="xilosa" value="{{ $cb->xilosa }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>2. Catalasa</td>
                                                    <td><input type="text" class="form-control" name="catalasa" value="{{ $cb->catalasa }}"></td>
                                                    <td>16. Arabinosa</td>
                                                    <td><input type="text" class="form-control" name="arabinosa" value="{{ $cb->arabinosa }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>3. Atrato</td>
                                                    <td><input type="text" class="form-control" name="atrato" value="{{ $cb->atrato }}"></td>
                                                    <td>17. Sacarosa</td>
                                                    <td><input type="text" class="form-control" name="sacarosa" value="{{ $cb->sacarosa }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>4. TSI</td>
                                                    <td><input type="text" class="form-control" name="tsi" value="{{ $cb->tsi }}"></td>
                                                    <td>18. Otros Azúcares</td>
                                                    <td><input type="text" class="form-control" name="otros_azucares" value="{{ $cb->otros_azucares }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>5. LIA</td>
                                                    <td><input type="text" class="form-control" name="lia" value="{{ $cb->lia }}"></td>
                                                    <td>19. Almidón</td>
                                                    <td><input type="text" class="form-control" name="almidon" value="{{ $cb->almidon }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>6. SIM</td>
                                                    <td><input type="text" class="form-control" name="sim" value="{{ $cb->sim }}"></td>
                                                    <td>20. Lecitinasa</td>
                                                    <td><input type="text" class="form-control" name="lecitinasa" value="{{ $cb->lecitinasa }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>7. RM</td>
                                                    <td><input type="text" class="form-control" name="rm" value="{{ $cb->rm }}"></td>
                                                    <td>21. Lipasa</td>
                                                    <td><input type="text" class="form-control" name="lipasa" value="{{ $cb->lipasa }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>8. VP</td>
                                                    <td><input type="text" class="form-control" name="vp" value="{{ $cb->vp }}"></td>
                                                    <td>22. Otras Enzimas</td>
                                                    <td><input type="text" class="form-control" name="otras_enzimas" value="{{ $cb->otras_enzimas }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>9. Nitrato</td>
                                                    <td><input type="text" class="form-control" name="nitrato" value="{{ $cb->nitrato }}"></td>
                                                    <td>23. Hidrólisis de la Caseína</td>
                                                    <td><input type="text" class="form-control" name="hidrolisis_caseina" value="{{ $cb->hidrolisis_caseina }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>10. Caldo Úrea</td>
                                                    <td><input type="text" class="form-control" name="caldo_urea" value="{{ $cb->caldo_urea }}"></td>
                                                    <td>24. Hidrólisis de la Gelatina</td>
                                                    <td><input type="text" class="form-control" name="hidrolisis_gelatina" value="{{ $cb->hidrolisis_gelatina }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>11. OF</td>
                                                    <td><input type="text" class="form-control" name="of" value="{{ $cb->of }}"></td>
                                                    <td>25. Hidrólisis de la Úrea</td>
                                                    <td><input type="text" class="form-control" name="hidrolisis_urea" value="{{ $cb->hidrolisis_urea }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>12. Glucosa</td>
                                                    <td><input type="text" class="form-control" name="glucosa" value="{{ $cb->glucosa }}"></td>
                                                    <td>26. Crecimiento en NaCl</td>
                                                    <td><input type="text" class="form-control" name="crecimiento_nacl" value="{{ $cb->crecimiento_nacl }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>13. Lactosa</td>
                                                    <td><input type="text" class="form-control" name="lactosa" value="{{ $cb->lactosa }}"></td>
                                                    <td>27. Crecimiento en diferentes temperaturas</td>
                                                    <td><input type="text" class="form-control" name="crecimiento_diferentes_temperaturas" value="{{ $cb->crecimiento_diferentes_temperaturas }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>14. Manitol</td>
                                                    <td><input type="text" class="form-control" name="manitol" value="{{ $cb->manitol }}"></td>
                                                    <td>28. Otras características bioquímicas</td>
                                                    <td><input type="text" class="form-control" name="otras_caracteristicas" value="{{ $cb->otras_caracteristicas }}"></td>
                                                </tr>
                                            </tbody>
                                        </table>

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
</div>


@endsection