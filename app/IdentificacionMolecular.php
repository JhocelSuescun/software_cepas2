<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdentificacionMolecular extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'identificacion_molecular';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cepa', 'fechaaccesion', 'rep_solu_salina', 'obs_solu_salina', 'rep_tub_agar',
     'obs_tub_agar', 'rep_suelo_esteril', 'obs_suelo_esteril', 'rep_cult_agar', 'obs_cult_agar',
      'rep_glicerol', 'obs_glicerol', 'rep_papel_filtro', 'obs_papel_filtro', 'porcentaje_similitud',
       'informe_secuenciacion'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
