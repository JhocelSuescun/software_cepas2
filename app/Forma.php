<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forma extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forma';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['forma'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
