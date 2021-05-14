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

/**
 * main route per le pagine "inerti"
 */
Route::get('/', 'MainController@index' )->name('home');

/**
 * route per le pagine in dialogo con il DB
 * 
 * Route::resource() include diversi 
 * 		method->URI->Controller@azione->name()
 */
Route::resource('/products', 'ProductController' );
/**
 * equivalentemente, più lungo:
 * 		Route::get('/products', 'ProductController@index' );
 * 		Route::post('/products', 'ProductController@store' );
 * 		...
 * 
 * stessa URI con diversi metodi conduce a diverse azioni del Controller
 * 
 * vedi 
 * 		php route:list
 */


// Route::get('/', function () {
//     return view('home');
// })->name('home-page');
