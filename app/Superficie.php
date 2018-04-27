<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superficie extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'superficie';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['superficie'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
