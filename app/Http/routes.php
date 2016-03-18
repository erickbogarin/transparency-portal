<?php

Route::get('/', function () {
    return view('layout');
});

Route::group(['prefix' => 'api'], function()
{
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser'); /* api authencicate */  
    Route::post('authenticate', 'AuthenticateController@authenticate'); /* api authencicate */  
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]); /* api authencicate */  
    
    Route::resource('users', 'UserController'); /* api user */
    Route::resource('user-transparencias', 'UserTransparenciasController'); /* api user transparencias */
 
    Route::resource('municipios', 'MunicipioController'); /* api municipio */

    Route::resource('transparencias', 'TransparenciasController'); /* api transparencias */
    Route::resource('tipos-transparencias', 'TipoTransparenciaController'); /* api tipos transparencias */
});

Route::any('{path?}', function()
{
    return view('layout');
})->where("path", ".+");

Blade::setContentTags('<%', '%>'); // For variables and all things Blade.
Blade::setEscapedContentTags('<%%', '%%>'); // For escaped data.


