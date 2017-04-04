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
Route::get('/authenticated', 'UsersController@authenticated');

// Register
Route::post('/api-register-user', 'Auth\RegisterController@apiRegisterUser');
// Route::get('/check-user-for-register', 'UsersController@checkUserForRegister');

Route::get('/not-allow', 'UsersController@notAllow');

// admin-panel
Route::get('/dashboard', 'UsersController@dashboard');

