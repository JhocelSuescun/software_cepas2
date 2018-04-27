<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consistencia extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'consistencia';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['consistencia'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
