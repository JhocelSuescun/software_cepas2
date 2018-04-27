<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InoculacionPlantas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inoculacion_plantas';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_proyecto', 'fecha', 'cultivo', 'variables', 'rendimiento',
    					 'peso_fresco_foliar', 'peso_seco_foliar', 'peso_fresco_radical',
    					 'peso_seco_radical', 'altura_planta', 'longitud_planta'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
