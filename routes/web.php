<?php

Route::any('admin/plans/search', 'Admin\PlanController@search')->name('plans.search');
Route::post('admin/plans', 'Admin\PlanController@store')->name('plans.store');
Route::delete('admin/plans/{url}', 'Admin\PlanController@destroy')->name('plans.destroy');
Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');
Route::get('admin/plans/{url}', 'Admin\PlanController@show')->name('plans.show');
Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');

Route::get('/', function () {
    return view('welcome');
});
