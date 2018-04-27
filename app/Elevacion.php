<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elevacion extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'elevacion';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['elevacion'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
