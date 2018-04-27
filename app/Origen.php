<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origen extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'origen';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['origen'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
