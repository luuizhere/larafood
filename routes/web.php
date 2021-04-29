<?php

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::put('plans/{url}', 'PlanController@update')->name('plan.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plan.edit');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::get('/', 'PlanController@index')->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
