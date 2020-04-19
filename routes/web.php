<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
   return redirect('/login');
});	

Route::middleware(['auth'])->group(function () {

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

	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');
	
	//Users
	Route::post('users/store', 'UserController@store')->name('users.store')
		->middleware('permission:users.create');

	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::get('users/create', 'UserController@create')->name('users.create')
		->middleware('permission:users.create');

	Route::put('users/{role}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::get('users/{role}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{role}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	Route::get('users/{role}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');

	//citas
	Route::get('citas', 'CitaController@index')->name('citas.index')
		->middleware('permission:users.index');

	Route::put('citas/{user}', 'CitaController@update')->name('citas.update')
		->middleware('permission:citas.edit');

	Route::get('citas/{user}', 'CitaController@show')->name('citas.show')
		->middleware('permission:citas.show');

	Route::delete('citas/{user}', 'CitaController@destroy')->name('citas.destroy')
		->middleware('permission:citas.destroy');

	Route::get('citas/{user}/edit', 'CitaController@edit')->name('citas.edit')
		->middleware('permission:citas.edit');

	Route::get('citas/create', 'CitaController@create')->name('citas.create')
		->middleware('permission:citas.create');

	Route::post('citas/store', 'CitaController@store')->name('citas.store')
		->middleware('permission:citas.create');
});


