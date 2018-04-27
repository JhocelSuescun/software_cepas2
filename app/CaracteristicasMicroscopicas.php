<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaracteristicasMicroscopicas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'caracteristicas_microscopicas';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cepa','forma','ordenamiento','tincion_gram','estado_tincion_esporas',
    						'ubicacion_esporas', 'tincion_capsula', 'otras_caracteristicas'];
    						
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
