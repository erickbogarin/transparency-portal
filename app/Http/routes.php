<?php

Route::get('/', function () {
    return view('layout');
});

Route::resource('municipios', 'MunicipioController');    

Route::any('{path?}', function()
{
    return view('layout');
})->where("path", ".+");

// Authentication routes..

