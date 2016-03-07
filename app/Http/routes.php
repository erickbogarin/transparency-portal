<?php

Route::get('/', function () {
    return view('layout');
});

Route::resource('municipios', 'MunicipioController');    

Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
});

Route::any('{path?}', function()
{
    return view('layout');
})->where("path", ".+");

Blade::setContentTags('<%', '%>'); // For variables and all things Blade.
Blade::setEscapedContentTags('<%%', '%%>'); // For escaped data.


