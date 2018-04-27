<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genero';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['genero'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
