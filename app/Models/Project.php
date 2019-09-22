<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model 
{

    protected $table = 'projects';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'date', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function project_details()
    {
        return $this->hasMany('App\Models\ProjectDetails');
    }

}