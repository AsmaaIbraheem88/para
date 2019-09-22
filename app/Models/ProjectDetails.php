<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDetails extends Model 
{

    protected $table = 'project_details';
    public $timestamps = true;
    protected $fillable = array('image','project_id');

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

}