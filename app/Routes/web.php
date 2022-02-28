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

Route::prefix('logs')->group(function () {
    Route::get('/rest/find-all', 'LogsRestController@findAll')
        ->name('logs-rest-find-all');
    Route::get('/rest/find-by-id/{id}', 'LogsRestController@findById')
        ->name('logs-rest-find-by-id');
    Route::post('/rest/store', 'LogsRestController@store')
        ->name('logs-rest-store');
});
