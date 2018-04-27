<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodoConservacionSuelo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'metodo_conservacion_suelo';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_metodo', 'microgota'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
