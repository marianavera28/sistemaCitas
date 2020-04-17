<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Superadministrador
Route::get('/admin', function () {
    return view('admin/dashboard');
});

//Clientes que utilizarán el sistema
Route::get('/client', function () {
    return view('client/dashboard');
});

//Clientes que solicitarán citas
Route::get('/customer', function () {
    return view('customer/dashboard');
});



