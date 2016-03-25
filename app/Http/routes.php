<?php

Route::get('/', function () {
    return view('layout');
});

Route::group(['prefix' => 'api'], function()
{
    /* api de autenticação*/  
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser'); 
    Route::post('authenticate', 'AuthenticateController@authenticate'); 
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]); 
    
    /* api de usuários autenticados */
    Route::resource('users', 'UserController'); 
    Route::resource('user-transparencias', 'EmployerTransparenciasController'); 

    /* api dos municipios */
    Route::resource('municipios', 'MunicipioController'); 

    /* api das transparencias */
    Route::resource('transparencias', 'TransparenciasController'); 
    Route::resource('tipos-transparencias', 'TipoTransparenciaController');
});

Route::group(['prefix' => 'public'], function()
{
    Route::resource('/upload', 'FileController@store');
    Route::get('/{filename}', 'FileController@find');
});

Route::any('{path?}', function()
{
    return view('layout');
})->where("path", ".+");

/* resolver for angularjs conflicts */
Blade::setContentTags('<%', '%>'); 
Blade::setEscapedContentTags('<%%', '%%>'); 


