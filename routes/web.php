<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Raw Materials
    Route::delete('raw-materials/destroy', 'RawMaterialController@massDestroy')->name('raw-materials.massDestroy');
    Route::resource('raw-materials', 'RawMaterialController');

    // Laboratories
    Route::delete('laboratories/destroy', 'LaboratoryController@massDestroy')->name('laboratories.massDestroy');
    Route::resource('laboratories', 'LaboratoryController');

    // Baseproducts
    Route::delete('baseproducts/destroy', 'BaseproductController@massDestroy')->name('baseproducts.massDestroy');
    Route::resource('baseproducts', 'BaseproductController');

    // Suppliers
    Route::delete('suppliers/destroy', 'SupplierController@massDestroy')->name('suppliers.massDestroy');
    Route::resource('suppliers', 'SupplierController');

    // Pharmaceutical Forms
    Route::delete('pharmaceutical-forms/destroy', 'PharmaceuticalFormController@massDestroy')->name('pharmaceutical-forms.massDestroy');
    Route::resource('pharmaceutical-forms', 'PharmaceuticalFormController');

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }

});
