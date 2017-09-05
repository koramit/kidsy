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
Route::get('/design/{view}/{dateFilter}', function ($view, $dateFilter) {
    $cases = \App\BiopsyCase::where('date_bx', '>=', $dateFilter)->get();
    return view('design.' . $view, compact('cases'));
});

Route::get('/', function() {
    return 'root';
});

Route::get('/home', function() {
    return redirect('/authenticated');
});

// Biopsy Case
Route::post('/biopsycases', 'BiopsyCasesController@store');
Route::patch('/biopsycases', 'BiopsyCasesController@update');
Route::get('/biopsycases/queue', 'BiopsyCasesController@queueIndex');
Route::get('/biopsycases', 'BiopsyCasesController@index');
Route::get('/query-folder-number', 'BiopsyCasesController@QueryFolderNumber');
Route::post('/query-folder-number', 'BiopsyCasesController@postQueryFolderNumber');
Route::get('/nephro-clinic-schedule/{id}', 'BiopsyCasesController@nephroClinicSchedule');
Route::get('/biopsycases/incomplete-post-complications-list', 'BiopsyCasesController@postComplicationsList');

Route::get('/biopsycases/{part}/{id}/edit', 'BiopsyCasesController@edit');
Route::get('/biopsycases/report/{id}', 'BiopsyCasesController@viewReport');
Route::get('/check-hn-in-queue/{hn}', 'BiopsyCasesController@checkHnInQueue');

// Case Folder
Route::patch('/casefolder/{hn}', 'CaseFolderController@update');
Route::get('/casefolder/{hn}/edit', 'CaseFolderController@edit');
// Route::resource('casefolder', 'CaseFolderController');


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
Route::get('/add-resident', 'UsersController@addResident');

// Quick create user by org_id
Route::post('/auto-create-user', 'Auth\RegisterController@autoCreateUser');

// Register user from another app.
Route::post('/api-register-user', 'Auth\RegisterController@apiRegisterUser');

// Internal APIs.
Route::get('/get-patho-diag-list/{search}', 'InternalAPIsController@getPathoDiagList');
Route::post('/post-patho-diag', 'InternalAPIsController@postPathoDiag');
Route::get('/get-folder-number/{hn}', 'InternalAPIsController@getFolderNumber');


// TEST
// Route::get('/patho-diag-list/{search}', function($search) {
//     $query = DB::table('patho_diagnosis_codes')->select('name')->where('name', 'like', '%' . $search . '%')->get();
//     return response()->json($query);
// });


