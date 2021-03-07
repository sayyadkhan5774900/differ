<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
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

    // Content Categories
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tags
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Pages
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Expense Categories
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Categories
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Incomes
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Reports
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Subjects
    Route::delete('subjects/destroy', 'SubjectController@massDestroy')->name('subjects.massDestroy');
    Route::resource('subjects', 'SubjectController');

    // Degrees
    Route::delete('degrees/destroy', 'DegreeController@massDestroy')->name('degrees.massDestroy');
    Route::resource('degrees', 'DegreeController');

    // Batches
    Route::delete('batches/destroy', 'BatchController@massDestroy')->name('batches.massDestroy');
    Route::resource('batches', 'BatchController');

    // Students
    Route::delete('students/destroy', 'StudentController@massDestroy')->name('students.massDestroy');
    Route::post('students/media', 'StudentController@storeMedia')->name('students.storeMedia');
    Route::post('students/ckmedia', 'StudentController@storeCKEditorImages')->name('students.storeCKEditorImages');
    Route::resource('students', 'StudentController');

    // Fee Types
    Route::delete('fee-types/destroy', 'FeeTypeController@massDestroy')->name('fee-types.massDestroy');
    Route::resource('fee-types', 'FeeTypeController');

    // Fees
    Route::delete('fees/destroy', 'FeeController@massDestroy')->name('fees.massDestroy');
    Route::resource('fees', 'FeeController');

    // Instalments
    Route::delete('instalments/destroy', 'InstalmentController@massDestroy')->name('instalments.massDestroy');
    Route::post('instalments/media', 'InstalmentController@storeMedia')->name('instalments.storeMedia');
    Route::post('instalments/ckmedia', 'InstalmentController@storeCKEditorImages')->name('instalments.storeCKEditorImages');
    Route::resource('instalments', 'InstalmentController');

    // Invoices
    Route::delete('invoices/destroy', 'InvoiceController@massDestroy')->name('invoices.massDestroy');
    Route::resource('invoices', 'InvoiceController');

    // Noticeboards
    Route::delete('noticeboards/destroy', 'NoticeboardController@massDestroy')->name('noticeboards.massDestroy');
    Route::post('noticeboards/media', 'NoticeboardController@storeMedia')->name('noticeboards.storeMedia');
    Route::post('noticeboards/ckmedia', 'NoticeboardController@storeCKEditorImages')->name('noticeboards.storeCKEditorImages');
    Route::resource('noticeboards', 'NoticeboardController');

    // Attendance Notifications
    Route::resource('attendance-notifications', 'AttendanceNotificationsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Date Sheet Notifications
    Route::resource('date-sheet-notifications', 'DateSheetNotificationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Notifications
    Route::delete('notifications/destroy', 'NotificationController@massDestroy')->name('notifications.massDestroy');
    Route::post('notifications/media', 'NotificationController@storeMedia')->name('notifications.storeMedia');
    Route::post('notifications/ckmedia', 'NotificationController@storeCKEditorImages')->name('notifications.storeCKEditorImages');
    Route::resource('notifications', 'NotificationController');

    // Result Notifications
    Route::resource('result-notifications', 'ResultNotificationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Home Sliders
    Route::delete('home-sliders/destroy', 'HomeSliderController@massDestroy')->name('home-sliders.massDestroy');
    Route::resource('home-sliders', 'HomeSliderController');

    // Faqs
    Route::delete('faqs/destroy', 'FaqsController@massDestroy')->name('faqs.massDestroy');
    Route::post('faqs/media', 'FaqsController@storeMedia')->name('faqs.storeMedia');
    Route::post('faqs/ckmedia', 'FaqsController@storeCKEditorImages')->name('faqs.storeCKEditorImages');
    Route::resource('faqs', 'FaqsController');

    // Team Memebers
    Route::delete('team-memebers/destroy', 'TeamMemeberController@massDestroy')->name('team-memebers.massDestroy');
    Route::post('team-memebers/media', 'TeamMemeberController@storeMedia')->name('team-memebers.storeMedia');
    Route::post('team-memebers/ckmedia', 'TeamMemeberController@storeCKEditorImages')->name('team-memebers.storeCKEditorImages');
    Route::resource('team-memebers', 'TeamMemeberController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServicesController');

    // Testimonials
    Route::delete('testimonials/destroy', 'TestimonialController@massDestroy')->name('testimonials.massDestroy');
    Route::post('testimonials/media', 'TestimonialController@storeMedia')->name('testimonials.storeMedia');
    Route::post('testimonials/ckmedia', 'TestimonialController@storeCKEditorImages')->name('testimonials.storeCKEditorImages');
    Route::resource('testimonials', 'TestimonialController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Study Materials
    Route::delete('study-materials/destroy', 'StudyMaterialController@massDestroy')->name('study-materials.massDestroy');
    Route::post('study-materials/media', 'StudyMaterialController@storeMedia')->name('study-materials.storeMedia');
    Route::post('study-materials/ckmedia', 'StudyMaterialController@storeCKEditorImages')->name('study-materials.storeCKEditorImages');
    Route::resource('study-materials', 'StudyMaterialController');

    // Events
    Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
    Route::post('events/media', 'EventsController@storeMedia')->name('events.storeMedia');
    Route::post('events/ckmedia', 'EventsController@storeCKEditorImages')->name('events.storeCKEditorImages');
    Route::resource('events', 'EventsController');

    // Reports
    Route::resource('reports', 'ReportController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('user-alerts/read', 'UserAlertsController@read');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Content Categories
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tags
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Pages
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Expense Categories
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Categories
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Incomes
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Subjects
    Route::delete('subjects/destroy', 'SubjectController@massDestroy')->name('subjects.massDestroy');
    Route::resource('subjects', 'SubjectController');

    // Degrees
    Route::delete('degrees/destroy', 'DegreeController@massDestroy')->name('degrees.massDestroy');
    Route::resource('degrees', 'DegreeController');

    // Batches
    Route::delete('batches/destroy', 'BatchController@massDestroy')->name('batches.massDestroy');
    Route::resource('batches', 'BatchController');

    // Students
    Route::delete('students/destroy', 'StudentController@massDestroy')->name('students.massDestroy');
    Route::post('students/media', 'StudentController@storeMedia')->name('students.storeMedia');
    Route::post('students/ckmedia', 'StudentController@storeCKEditorImages')->name('students.storeCKEditorImages');
    Route::resource('students', 'StudentController');

    // Fee Types
    Route::delete('fee-types/destroy', 'FeeTypeController@massDestroy')->name('fee-types.massDestroy');
    Route::resource('fee-types', 'FeeTypeController');

    // Fees
    Route::delete('fees/destroy', 'FeeController@massDestroy')->name('fees.massDestroy');
    Route::resource('fees', 'FeeController');

    // Instalments
    Route::delete('instalments/destroy', 'InstalmentController@massDestroy')->name('instalments.massDestroy');
    Route::post('instalments/media', 'InstalmentController@storeMedia')->name('instalments.storeMedia');
    Route::post('instalments/ckmedia', 'InstalmentController@storeCKEditorImages')->name('instalments.storeCKEditorImages');
    Route::resource('instalments', 'InstalmentController');

    // Invoices
    Route::delete('invoices/destroy', 'InvoiceController@massDestroy')->name('invoices.massDestroy');
    Route::resource('invoices', 'InvoiceController');

    // Noticeboards
    Route::delete('noticeboards/destroy', 'NoticeboardController@massDestroy')->name('noticeboards.massDestroy');
    Route::post('noticeboards/media', 'NoticeboardController@storeMedia')->name('noticeboards.storeMedia');
    Route::post('noticeboards/ckmedia', 'NoticeboardController@storeCKEditorImages')->name('noticeboards.storeCKEditorImages');
    Route::resource('noticeboards', 'NoticeboardController');

    // Attendance Notifications
    Route::resource('attendance-notifications', 'AttendanceNotificationsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Date Sheet Notifications
    Route::resource('date-sheet-notifications', 'DateSheetNotificationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Notifications
    Route::delete('notifications/destroy', 'NotificationController@massDestroy')->name('notifications.massDestroy');
    Route::post('notifications/media', 'NotificationController@storeMedia')->name('notifications.storeMedia');
    Route::post('notifications/ckmedia', 'NotificationController@storeCKEditorImages')->name('notifications.storeCKEditorImages');
    Route::resource('notifications', 'NotificationController');

    // Result Notifications
    Route::resource('result-notifications', 'ResultNotificationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Home Sliders
    Route::delete('home-sliders/destroy', 'HomeSliderController@massDestroy')->name('home-sliders.massDestroy');
    Route::resource('home-sliders', 'HomeSliderController');

    // Faqs
    Route::delete('faqs/destroy', 'FaqsController@massDestroy')->name('faqs.massDestroy');
    Route::post('faqs/media', 'FaqsController@storeMedia')->name('faqs.storeMedia');
    Route::post('faqs/ckmedia', 'FaqsController@storeCKEditorImages')->name('faqs.storeCKEditorImages');
    Route::resource('faqs', 'FaqsController');

    // Team Memebers
    Route::delete('team-memebers/destroy', 'TeamMemeberController@massDestroy')->name('team-memebers.massDestroy');
    Route::post('team-memebers/media', 'TeamMemeberController@storeMedia')->name('team-memebers.storeMedia');
    Route::post('team-memebers/ckmedia', 'TeamMemeberController@storeCKEditorImages')->name('team-memebers.storeCKEditorImages');
    Route::resource('team-memebers', 'TeamMemeberController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServicesController');

    // Testimonials
    Route::delete('testimonials/destroy', 'TestimonialController@massDestroy')->name('testimonials.massDestroy');
    Route::post('testimonials/media', 'TestimonialController@storeMedia')->name('testimonials.storeMedia');
    Route::post('testimonials/ckmedia', 'TestimonialController@storeCKEditorImages')->name('testimonials.storeCKEditorImages');
    Route::resource('testimonials', 'TestimonialController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Study Materials
    Route::delete('study-materials/destroy', 'StudyMaterialController@massDestroy')->name('study-materials.massDestroy');
    Route::post('study-materials/media', 'StudyMaterialController@storeMedia')->name('study-materials.storeMedia');
    Route::post('study-materials/ckmedia', 'StudyMaterialController@storeCKEditorImages')->name('study-materials.storeCKEditorImages');
    Route::resource('study-materials', 'StudyMaterialController');

    // Events
    Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
    Route::post('events/media', 'EventsController@storeMedia')->name('events.storeMedia');
    Route::post('events/ckmedia', 'EventsController@storeCKEditorImages')->name('events.storeCKEditorImages');
    Route::resource('events', 'EventsController');

    // Reports
    Route::resource('reports', 'ReportController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
