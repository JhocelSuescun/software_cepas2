<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodoConservacionAgarSolidoCaja extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'metodo_conservacion_agar_solido_caja';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_metodo'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
