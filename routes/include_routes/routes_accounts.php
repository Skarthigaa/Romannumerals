<?php


//Roman
Route::get('roman', array('as' => '','check'=>'','menu'=>'','label'=>'','uses' =>'RomanController@create'))->name('roman');
//print_r("dsf");exit;
Route::get('/', function () {
     //return resource_path('views');
     return view('/roman/form');
 });
?>