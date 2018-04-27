<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borde extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'borde';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['borde'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
