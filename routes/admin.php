<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'],function(){    // un authenticated  admin
    //Config::set('auth.defines','admin'); //to use admin model


    Route::get('login','AdminAuth@login');
    Route::post('login','AdminAuth@dologin');
    Route::get('forgot/password', 'AdminAuth@forgot_password');
    Route::post('forgot/password', 'AdminAuth@forgot_password_post');

    Route::get('reset/password/{pin_code}', 'AdminAuth@reset_password');
    Route::post('reset/password/{token}', 'AdminAuth@reset_password_final');


    Route::group(['middleware' => 'admin:admin'],function(){   // authenticated admin (middleware admin&gaurd admin)
      
        Route::get('/', function () {
            return view('admin.home');
        });
        Route::any('logout','AdminAuth@logout');

        Route::resource('admin', 'AdminController');
        Route::delete('admin/destroy/all', 'AdminController@multi_delete');

        Route::resource('clients', 'ClientController');
        Route::delete('clients/destroy/all', 'ClientController@multi_delete');

        Route::resource('services', 'ServiceController');
        Route::delete('services/destroy/all', 'ServiceController@multi_delete');

        Route::resource('testimonials', 'TestimonialController');
        Route::delete('testimonials/destroy/all', 'TestimonialController@multi_delete');

        
        Route::resource('sliders', 'SliderController');
        Route::delete('sliders/destroy/all', 'SliderController@multi_delete');

        Route::resource('team', 'TeamController');
        Route::delete('team/destroy/all', 'TeamController@multi_delete');

        Route::get('settings', 'SettingsController@setting_view');
        Route::post('settings', 'SettingsController@setting_save');

        Route::get('sections', 'SectionController@section_view');
        Route::post('sections', 'SectionController@section_save');
      
        Route::resource('contacts', 'ContactController');
        Route::delete('contacts/destroy/all', 'ContactController@multi_delete');

        Route::resource('projects', 'ProjectController');
        Route::delete('projects/destroy/all', 'ProjectController@multi_delete');

        Route::resource('project-details', 'ProjectDetailsController');
        Route::delete('project-details/destroy/all', 'ProjectDetailsController@multi_delete');

        Route::resource('categories', 'CategoryController');
        Route::delete('categories/destroy/all', 'CategoryController@multi_delete');

        Route::get('change-password','AdminAuth@changePassword');
        Route::post('change-password','AdminAuth@changePasswordSave');
       

    });

   
    
});

