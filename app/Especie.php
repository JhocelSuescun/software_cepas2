<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'especie';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['especie', 'id_genero'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
