<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model 
{

    protected $table = 'teams';
    public $timestamps = true;
    protected $fillable = array('name', 'job', 'image', 'facebook', 'twitter');

}