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

// Biopsy Case resource.
// Route::patch('/biopsycases', function (Illuminate\Http\Request $request) {
//     return $request->all();
// });
Route::patch('/biopsycases', 'BiopsyCasesController@update');
Route::get('/biopsycases/set-biopsy', 'BiopsyCasesController@showSetBiopyForm');
Route::get('/biopsycases/{part}/{id}/edit', 'BiopsyCasesController@edit');


Route::get('/biopsy/clinical-data', 'BiopsyCasesController@showClinicalDataForm');
Route::get('/biopsy/pre-biopsy-data', 'BiopsyCasesController@showPreBiopsyDataForm');
Route::get('/biopsy/procedure-note', 'BiopsyCasesController@showProcedureNoteForm');

// APIs alllow without Auth.

// Route::get('/api-get-user/{sap}', 'APIsController@getUser');
// Route::get('/api-get-user/{sap}', 'APIsController@getUser');