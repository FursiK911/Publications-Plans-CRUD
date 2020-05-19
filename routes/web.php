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
    return redirect('/plans');
});

Auth::routes();

Route::resource('plans', 'PublicationPlanController');

Route::middleware(['role'])->group(function () {
    Route::get('add-to-base', 'AdditionsToBaseController@create');
    Route::post('add-to-base', 'AdditionsToBaseController@store');
    Route::get('select-table-for-remove-from-base', 'AdditionsToBaseController@remove');
    Route::post('select-table-for-remove-from-base', 'AdditionsToBaseController@select_table_remove');
    Route::post('remove-from-base', 'AdditionsToBaseController@destroy');
    Route::get('select-table-for-update-base', 'AdditionsToBaseController@change');
    Route::post('change-data-base', 'AdditionsToBaseController@select_data_for_update');
    Route::post('update_combobox', 'AdditionsToBaseController@update_table_combobox');
    Route::post('update-base', 'AdditionsToBaseController@update');
    Route::get('report_chair', 'ReportController@ReportForChair');
    Route::get('report_type_publication', 'ReportController@ReportForTypePublication');
    Route::get('edit_users', 'ReportController@ReportForTypePublication');

});

Route::get('logout', 'LogoutController@logout');
