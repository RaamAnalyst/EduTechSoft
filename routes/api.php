<?php

use App\Http\Controllers\Api\V1\Admin\AssignmentApiController;
use App\Http\Controllers\Api\V1\Admin\AuthorDetailApiController;
use App\Http\Controllers\Api\V1\Admin\BrowseAssignmentApiController;
use App\Http\Controllers\Api\V1\Admin\CategoryApiController;
use App\Http\Controllers\Api\V1\Admin\CourseApiController;
use App\Http\Controllers\Api\V1\Admin\DeliveryApiController;
use App\Http\Controllers\Api\V1\Admin\JournalDetailApiController;
use App\Http\Controllers\Api\V1\Admin\KeywordApiController;
use App\Http\Controllers\Api\V1\Admin\LessonApiController;
use App\Http\Controllers\Api\V1\Admin\OrderApiController;
use App\Http\Controllers\Api\V1\Admin\PaymentAccountApiController;
use App\Http\Controllers\Api\V1\Admin\PaymentApiController;
use App\Http\Controllers\Api\V1\Admin\PaymentStatusApiController;
use App\Http\Controllers\Api\V1\Admin\PublisherApiController;
use App\Http\Controllers\Api\V1\Admin\QuestionApiController;
use App\Http\Controllers\Api\V1\Admin\QuestionOptionApiController;
use App\Http\Controllers\Api\V1\Admin\SearchArticleApiController;
use App\Http\Controllers\Api\V1\Admin\ServiceApiController;
use App\Http\Controllers\Api\V1\Admin\TestAnswerApiController;
use App\Http\Controllers\Api\V1\Admin\TestApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Orders
    Route::post('orders/media', [OrderApiController::class, 'storeMedia'])->name('orders.store_media');
    Route::apiResource('orders', OrderApiController::class);

    // Services
    Route::apiResource('services', ServiceApiController::class);

    // Payments
    Route::apiResource('payments', PaymentApiController::class);

    // Payment Account
    Route::apiResource('payment-accounts', PaymentAccountApiController::class);

    // Payment Status
    Route::apiResource('payment-statuses', PaymentStatusApiController::class);

    // Delivery
    Route::apiResource('deliveries', DeliveryApiController::class);

    // Courses
    Route::post('courses/media', [CourseApiController::class, 'storeMedia'])->name('courses.store_media');
    Route::apiResource('courses', CourseApiController::class);

    // Lessons
    Route::post('lessons/media', [LessonApiController::class, 'storeMedia'])->name('lessons.store_media');
    Route::apiResource('lessons', LessonApiController::class);

    // Tests
    Route::apiResource('tests', TestApiController::class);

    // Questions
    Route::post('questions/media', [QuestionApiController::class, 'storeMedia'])->name('questions.store_media');
    Route::apiResource('questions', QuestionApiController::class);

    // Question Options
    Route::apiResource('question-options', QuestionOptionApiController::class);

    // Test Answers
    Route::apiResource('test-answers', TestAnswerApiController::class);

    // Assignments
    Route::post('assignments/media', [AssignmentApiController::class, 'storeMedia'])->name('assignments.store_media');
    Route::apiResource('assignments', AssignmentApiController::class);

    // Categories
    Route::apiResource('categories', CategoryApiController::class);

    // Browse Assignments
    Route::post('browse-assignments/media', [BrowseAssignmentApiController::class, 'storeMedia'])->name('browse_assignments.store_media');
    Route::apiResource('browse-assignments', BrowseAssignmentApiController::class);

    // Journal Details
    Route::apiResource('journal-details', JournalDetailApiController::class);

    // Author Details
    Route::apiResource('author-details', AuthorDetailApiController::class);

    // Publisher
    Route::apiResource('publishers', PublisherApiController::class);

    // Search Articles
    Route::apiResource('search-articles', SearchArticleApiController::class);

    // Keywords
    Route::apiResource('keywords', KeywordApiController::class);
});
