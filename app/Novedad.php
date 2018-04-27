<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'novedad';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'fecha', 'imagen', 'informacion', 'publicado'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
