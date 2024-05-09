<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Web Routes 

Register web routes for your app's RouteServiceProvider 
in a group containing the "web" middleware
*/


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/roles', 'RolesController@index')->name('roles.index');
Route::post('/roles', 'RolesController@store')->name('roles.store');
Route::post('/roles/delete', 'RolesController@destroy')->name('roles.destroy');
