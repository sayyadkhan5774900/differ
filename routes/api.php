<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Content Categories
    Route::apiResource('content-categories', 'ContentCategoryApiController');

    // Content Tags
    Route::apiResource('content-tags', 'ContentTagApiController');

    // Content Pages
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::apiResource('content-pages', 'ContentPageApiController');

    // Expense Categories
    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    // Income Categories
    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    // Expenses
    Route::apiResource('expenses', 'ExpenseApiController');

    // Incomes
    Route::apiResource('incomes', 'IncomeApiController');

    // Batches
    Route::apiResource('batches', 'BatchApiController');

    // Fees
    Route::apiResource('fees', 'FeeApiController');

    // Home Sliders
    Route::post('home-sliders/media', 'HomeSliderApiController@storeMedia')->name('home-sliders.storeMedia');
    Route::apiResource('home-sliders', 'HomeSliderApiController');

    // Faqs
    Route::post('faqs/media', 'FaqsApiController@storeMedia')->name('faqs.storeMedia');
    Route::apiResource('faqs', 'FaqsApiController');

    // Team Memebers
    Route::post('team-memebers/media', 'TeamMemeberApiController@storeMedia')->name('team-memebers.storeMedia');
    Route::apiResource('team-memebers', 'TeamMemeberApiController');

    // Services
    Route::post('services/media', 'ServicesApiController@storeMedia')->name('services.storeMedia');
    Route::apiResource('services', 'ServicesApiController');

    // Testimonials
    Route::post('testimonials/media', 'TestimonialApiController@storeMedia')->name('testimonials.storeMedia');
    Route::apiResource('testimonials', 'TestimonialApiController');

    // Settings
    Route::post('settings/media', 'SettingsApiController@storeMedia')->name('settings.storeMedia');
    Route::apiResource('settings', 'SettingsApiController');

    // Study Materials
    Route::post('study-materials/media', 'StudyMaterialApiController@storeMedia')->name('study-materials.storeMedia');
    Route::apiResource('study-materials', 'StudyMaterialApiController');

    // Events
    Route::post('events/media', 'EventsApiController@storeMedia')->name('events.storeMedia');
    Route::apiResource('events', 'EventsApiController');
});
