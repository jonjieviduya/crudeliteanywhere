<?php


Route::view('/', 'home');

Route::resource('users', 'UserController');
Route::resource('organizations', 'OrganizationController');
