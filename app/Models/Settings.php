<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array(
        'about_msg', 
        'footer_msg', 
        'sitename',
         'years_exp', 
         'happy_clients',
          'finished_projects', 
          'email', 
          'phone', 
          'fax',
           'address',
            'facebook',
             'twitter', 
             'instgram', 
             'linkedin', 
             'logo', 
             'icon', 
             'about_image',
              'about_video', 
              'message_maintenance',
            'status'
            
            );

}