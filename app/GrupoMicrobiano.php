<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoMicrobiano extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grupo_microbiano';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['grupo_microbiano'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
