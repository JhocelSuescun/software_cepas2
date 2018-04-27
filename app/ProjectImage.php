<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_images';
    protected $fillable = ['id_projecto', 'description', 'file_name'];
}
