<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaracterizacionFisiologica extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'caracterizacion_fisiologica';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cepa', 'fecha', 'acido_indolacetico', 'solubilizacion_fosfatos', 
    'produccion_sideroforos', 'fijacion_nitrogeno', 'acido_salicilico', 'actividad_enzimatica'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
