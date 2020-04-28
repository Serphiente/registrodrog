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

    // Suppliers
    Route::apiResource('suppliers', 'SupplierApiController');

    // Pharmaceutical Forms
    Route::apiResource('pharmaceutical-forms', 'PharmaceuticalFormApiController');

    // Ingresos
    Route::apiResource('ingresos', 'IngresoApiController');

    // Task Statuses
    Route::apiResource('task-statuses', 'TaskStatusApiController');

    // Task Tags
    Route::apiResource('task-tags', 'TaskTagApiController');

    // Tasks
    Route::post('tasks/media', 'TaskApiController@storeMedia')->name('tasks.storeMedia');
    Route::apiResource('tasks', 'TaskApiController');

    // Clients
    Route::apiResource('clients', 'ClientApiController');

    // Client Contacts
    Route::apiResource('client-contacts', 'ClientContactApiController');

    // Purchase Orders
    Route::apiResource('purchase-orders', 'PurchaseOrderApiController');

    // Purchase Orden Items
    Route::apiResource('purchase-orden-items', 'PurchaseOrdenItemApiController');

});
