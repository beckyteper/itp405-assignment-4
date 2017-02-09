<?php

Route::get('/', 'TwitterController@create');
Route::post('/', 'TwitterController@store');
Route::get('/{id}/delete', 'TwitterController@destroy');
Route::get('tweets/{id}', 'TwitterController@singleTweet');
