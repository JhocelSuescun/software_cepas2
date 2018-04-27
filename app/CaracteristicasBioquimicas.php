<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaracteristicasBioquimicas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'caracteristicas_bioquimicas';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cepa','oxidasa','catalasa','atrato','tsi', 'lia', 'sim', 'rm', 'vp',
    						'nitrato', 'caldo_urea', 'of', 'glucosa', 'lactosa', 'manitol',
    						'xilosa', 'arabinosa', 'sacarosa', 'otros_azucares', 'almidon',
    						'lecitinasa', 'lipasa', 'otras_enzimas', 'hidrolisis_caseina',
    						'hidrolisis_gelatina', 'hidrolisis_urea', 'crecimiento_nacl',
    						'crecimiento_diferentes_temperaturas', 'otras_caracteristicas'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
