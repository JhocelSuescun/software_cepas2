<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cepa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cepa';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo', 'estado', 'id_grupomicrobiano', 'id_genero', 'id_especie', 'id_origen', 'morfologia', 'tincion_gram', 'motilidad', 'publicado'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
