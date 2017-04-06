<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// For view in design process.
Route::get('/design/{view}', function ($view) {
    return view('design.' . $view);
});

Route::get('/', function() {
    return 'HOME';
});

// Biopsy Case
Route::post('/biopsycases', 'BiopsyCasesController@store');
Route::patch('/biopsycases', 'BiopsyCasesController@update');
Route::get('/biopsycases/queue', 'BiopsyCasesController@queueIndex');
Route::get('/biopsycases/{part}/{id}/edit', 'BiopsyCasesController@edit');
Route::get('/biopsycases/report/{id}', 'BiopsyCasesController@viewReport');
Route::get('/check-hn-in-queue/{hn}', 'BiopsyCasesController@checkHnInQueue');

// Auth
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

// Users
Route::get('/dashboard', 'UsersController@dashboard');
Route::get('/authenticated', 'UsersController@authenticated');
Route::get('/users/{id}/edit', 'UsersController@edit');
Route::get('/not-allow', 'UsersController@notAllow');
Route::patch('/users', 'UsersController@update');

// Register
Route::post('/api-register-user', 'Auth\RegisterController@apiRegisterUser');
// Route::get('/check-user-for-register', 'UsersController@checkUserForRegister');






