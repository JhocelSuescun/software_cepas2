<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'investigador';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','apellidos','codigo','email','url_cvlac','imagen',];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
