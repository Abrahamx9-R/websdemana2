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

Route::get('/', function () {
    return view('welcome');
})->middleware('welcome');

Route::resource('entregas',EntregaController::class);

Route::get('saludos/{nombre}?',function($nombre="ana"){
	return "Hola".$nombre;
});
Route::get('admin',function(){
	return "Si eres admin";
})->middleware('admin');

Route::middleware(['admin'])->group(function(){
	Route::get('admin2',function(){
		return view('layouts.admin');
	});
	Route::resource('admintareas',TareaController::class);
});


Auth::routes();

Route::get('cal',[App\Http\Controllers\HomeController::class,'cal'])->name('cal');

Route::get('/home', 'HomeController@index')->name('home');
