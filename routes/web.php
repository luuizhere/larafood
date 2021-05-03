<?php

Route::prefix('admin')->namespace('Admin')->group(function(){

    /**
     * Routes Permissions Profiles
     */

    Route::get('profile/{id}/permissions/{idPermission}/detach','ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permissions.detach');
    Route::post('profile/{id}/permissions','ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::any('profile/{id}/permissions/create','ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('profile/{id}/permissions','ACL\PermissionProfileController@permissions')->name('profiles.permissions');

    /**
     * Routes Permissions
     */
    Route::resource('permissions','ACL\PermissionController');

    /**
     * Routes Profiles
     */
    Route::resource('profiles','ACL\ProfileController');
    /**
     * Routes Plans Details
     */
    Route::get('plans/{url}/details/create','DetailPlanController@create')->name('details.plan.create');
    Route::delete('plans/{url}/details/{idDetail}','DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}','DetailPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}','DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit','DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details','DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details','DetailPlanController@index')->name('details.plan.index');

    /**
     * Routes Plan 
     */
    Route::put('plans/{url}', 'PlanController@update')->name('plan.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plan.edit');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::get('plans', 'PlanController@index')->name('plans.index');

    /**
     * Home DashBoard
     */
    Route::get('/', 'PlanController@index')->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
