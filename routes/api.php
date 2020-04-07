<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Raw Materials
    Route::apiResource('raw-materials', 'RawMaterialApiController');

    // Laboratories
    Route::apiResource('laboratories', 'LaboratoryApiController');

    // Baseproducts
    Route::apiResource('baseproducts', 'BaseproductApiController');

});
