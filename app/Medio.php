<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medio';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['medio'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
