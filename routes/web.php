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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('plans', 'PublicationPlanController');

Route::get('add-to-base', 'AdditionsToBaseController@create');
Route::post('add-to-base', 'AdditionsToBaseController@store');

Route::get('select-table-for-remove-from-base', 'AdditionsToBaseController@remove');
Route::post('select-table-for-remove-from-base', 'AdditionsToBaseController@select_table');
Route::post('remove-from-base', 'AdditionsToBaseController@destroy');
