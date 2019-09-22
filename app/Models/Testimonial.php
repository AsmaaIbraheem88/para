<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model 
{

    protected $table = 'testimonials';
    public $timestamps = true;
    protected $fillable = array('client_name', 'client_image', 'photo', 'client_city', 'client_comment');

}