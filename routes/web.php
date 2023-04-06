<?php

use App\Http\Controllers\Admin\AssignmentController;
use App\Http\Controllers\Admin\AuthorDetailController;
use App\Http\Controllers\Admin\BrowseAssignmentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JournalDetailController;
use App\Http\Controllers\Admin\KeywordController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentAccountController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PaymentStatusController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuestionOptionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SearchArticleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SystemCalendarController;
use App\Http\Controllers\Admin\TestAnswerController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\TestResultController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ApprovalController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['verify' => true]);

Route::get('email/approval', [ApprovalController::class, 'show'])->name('approval.notice');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'approved']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // User Alert
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // Orders
    Route::post('orders/media', [OrderController::class, 'storeMedia'])->name('orders.storeMedia');
    Route::resource('orders', OrderController::class, ['except' => ['store', 'update', 'destroy']]);

    // Services
    Route::resource('services', ServiceController::class, ['except' => ['store', 'update', 'destroy']]);

    // Payments
    Route::resource('payments', PaymentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Payment Account
    Route::resource('payment-accounts', PaymentAccountController::class, ['except' => ['store', 'update', 'destroy']]);

    // Payment Status
    Route::resource('payment-statuses', PaymentStatusController::class, ['except' => ['store', 'update', 'destroy']]);

    // Delivery
    Route::resource('deliveries', DeliveryController::class, ['except' => ['store', 'update', 'destroy']]);

    // System Calendar
    Route::resource('system-calendars', SystemCalendarController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Courses
    Route::post('courses/media', [CourseController::class, 'storeMedia'])->name('courses.storeMedia');
    Route::resource('courses', CourseController::class, ['except' => ['store', 'update', 'destroy']]);

    // Lessons
    Route::post('lessons/media', [LessonController::class, 'storeMedia'])->name('lessons.storeMedia');
    Route::resource('lessons', LessonController::class, ['except' => ['store', 'update', 'destroy']]);

    // Tests
    Route::resource('tests', TestController::class, ['except' => ['store', 'update', 'destroy']]);

    // Questions
    Route::post('questions/media', [QuestionController::class, 'storeMedia'])->name('questions.storeMedia');
    Route::resource('questions', QuestionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Question Options
    Route::resource('question-options', QuestionOptionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Test Results
    Route::resource('test-results', TestResultController::class, ['except' => ['store', 'update', 'destroy']]);

    // Test Answers
    Route::resource('test-answers', TestAnswerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Assignments
    Route::post('assignments/media', [AssignmentController::class, 'storeMedia'])->name('assignments.storeMedia');
    Route::resource('assignments', AssignmentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Categories
    Route::post('categories/csv', [CategoryController::class, 'csvStore'])->name('categories.csv.store');
    Route::put('categories/csv', [CategoryController::class, 'csvUpdate'])->name('categories.csv.update');
    Route::resource('categories', CategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Browse Assignments
    Route::post('browse-assignments/media', [BrowseAssignmentController::class, 'storeMedia'])->name('browse-assignments.storeMedia');
    Route::post('browse-assignments/csv', [BrowseAssignmentController::class, 'csvStore'])->name('browse-assignments.csv.store');
    Route::put('browse-assignments/csv', [BrowseAssignmentController::class, 'csvUpdate'])->name('browse-assignments.csv.update');
    Route::resource('browse-assignments', BrowseAssignmentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Journal Details
    Route::post('journal-details/csv', [JournalDetailController::class, 'csvStore'])->name('journal-details.csv.store');
    Route::put('journal-details/csv', [JournalDetailController::class, 'csvUpdate'])->name('journal-details.csv.update');
    Route::resource('journal-details', JournalDetailController::class, ['except' => ['store', 'update', 'destroy']]);

    // Author Details
    Route::post('author-details/csv', [AuthorDetailController::class, 'csvStore'])->name('author-details.csv.store');
    Route::put('author-details/csv', [AuthorDetailController::class, 'csvUpdate'])->name('author-details.csv.update');
    Route::resource('author-details', AuthorDetailController::class, ['except' => ['store', 'update', 'destroy']]);

    // Publisher
    Route::post('publishers/csv', [PublisherController::class, 'csvStore'])->name('publishers.csv.store');
    Route::put('publishers/csv', [PublisherController::class, 'csvUpdate'])->name('publishers.csv.update');
    Route::resource('publishers', PublisherController::class, ['except' => ['store', 'update', 'destroy']]);

    // Search Articles
    Route::post('search-articles/csv', [SearchArticleController::class, 'csvStore'])->name('search-articles.csv.store');
    Route::put('search-articles/csv', [SearchArticleController::class, 'csvUpdate'])->name('search-articles.csv.update');
    Route::resource('search-articles', SearchArticleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Keywords
    Route::post('keywords/csv', [KeywordController::class, 'csvStore'])->name('keywords.csv.store');
    Route::put('keywords/csv', [KeywordController::class, 'csvUpdate'])->name('keywords.csv.update');
    Route::resource('keywords', KeywordController::class, ['except' => ['store', 'update', 'destroy']]);

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/inbox', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('messages/outbox', [MessageController::class, 'outbox'])->name('messages.outbox');
    Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::get('messages/{conversation}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{conversation}', [MessageController::class, 'update'])->name('messages.update');
    Route::post('messages/{conversation}/destroy', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
