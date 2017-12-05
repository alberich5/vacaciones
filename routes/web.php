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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {
//Menu

Route::get('/menu', 'HomeController@index')->name('menu');

Route::get('/menumodulos', 'HomeController@verificarModulos')->name('menumodulos');

Route::get('/menusucursales', 'HomeController@verificarSucursales')->name('menusucursales');

Route::post('/setsucursal/{id}', 'HomeController@setSucursal')->name('setsucursal');

Route::get('/getsucursal', 'HomeController@getSucursal')->name('getsucursal');




//Administrador
Route::get('/administrador/',['uses'=> 'administrador\MenuController@index', 'as'=> 'administrador.menu.index']);
//--usuario




Route::get('/administrador/usuario', 'administrador\UsuarioController@index')->name('administrador.usuario.index');

Route::get('/administrador/usuarios',['uses'=> 'administrador\UsuarioController@getUsuarios', 'as'=> 'administrador.usuario']);


Route::post('/administrador/usuario/search',['uses'=> 'administrador\UsuarioController@searchUsuario', 'as'=> 'administrador.usuario.search']);

Route::post('/administrador/usuario/show',['uses'=> 'administrador\UsuarioController@showUsuario', 'as'=> 'administrador.usuario.show']);

Route::post('/administrador/usuario/edit',['uses'=> 'administrador\UsuarioController@editUsuario', 'as'=> 'administrador.usuario.edit']);

Route::post('/administrador/usuario/historial',['uses'=> 'administrador\UsuarioController@historialUsuario', 'as'=> 'administrador.usuario.historial']);

Route::post('/administrador/usuario/create',['uses'=> 'administrador\UsuarioController@createUsuario', 'as'=> 'administrador.usuario.create']);

Route::post('/administrador/usuario/calcularfecha',['uses'=> 'administrador\UsuarioController@calcularFecha', 'as'=> 'administrador.usuario.calcularFecha']);

Route::get('/administrador/usuario/vacaciones/download/{idpermiso}',['uses'=> 'administrador\UsuarioController@download', 'as'=> 'administrador.usuario.vacaciones.download']);


Route::get('/administrador/pruebaWord',['uses'=> 'administrador\UsuarioController@prueba', 'as'=> 'administrador.prueba']);




});
/*


*/


