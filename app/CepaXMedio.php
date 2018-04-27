<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CepaXMedio extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cepaxmedio';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cepa','id_medio','id_borde','id_consistencia','id_detalleoptico',
    						'id_elevacion', 'id_forma', 'id_superficie', 'color', 'otrasCaracteristicas'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
