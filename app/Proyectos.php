<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proyectos';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_proyecto', 'estado', 'cepas_asociadas', 'fecha_aislamiento', 'lugar_aislamiento', 'nombre_aislador', 'publicado'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
