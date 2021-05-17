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
 * main route for not-DB-related pages
 */
Route::get('/', 'MainController@index')->name('home');

/**
 * multiple route for DB-related pages
 * 		Route::resource() icludes
 *		method->URI->name->Controller@action
 * 		for Create/Read/Update/Delete DB data
 * see
 * 		php route:list
 */
Route::resource('/products', 'ProductController');
/**
 * equivalent
 * 		Route::get('/products', 'ProductController@index' );
 * 		Route::post('/products', 'ProductController@store' );
 * 		...
 * 
 * same URI called with different methods leads to different ModelController actions
 */

// Route::get('/', function () {
//     return view('welcome');
// });
