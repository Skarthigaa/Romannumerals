<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('roman.form');
});

Route::get('roman', 'RomanController@create');
Route::get('getintegerToRoman', 'RomanController@getintegerToRoman');

Route::post('roman', 'RomanController@store');




