<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model 
{

    protected $table = 'services';
    public $timestamps = true;
    protected $fillable = array('name', 'description', 'image');

}