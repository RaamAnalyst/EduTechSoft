<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'order_management_access',
            ],
            [
                'id'    => 24,
                'title' => 'order_create',
            ],
            [
                'id'    => 25,
                'title' => 'order_edit',
            ],
            [
                'id'    => 26,
                'title' => 'order_show',
            ],
            [
                'id'    => 27,
                'title' => 'order_delete',
            ],
            [
                'id'    => 28,
                'title' => 'order_access',
            ],
            [
                'id'    => 29,
                'title' => 'service_management_access',
            ],
            [
                'id'    => 30,
                'title' => 'service_create',
            ],
            [
                'id'    => 31,
                'title' => 'service_edit',
            ],
            [
                'id'    => 32,
                'title' => 'service_show',
            ],
            [
                'id'    => 33,
                'title' => 'service_delete',
            ],
            [
                'id'    => 34,
                'title' => 'service_access',
            ],
            [
                'id'    => 35,
                'title' => 'payment_management_access',
            ],
            [
                'id'    => 36,
                'title' => 'payment_create',
            ],
            [
                'id'    => 37,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 38,
                'title' => 'payment_show',
            ],
            [
                'id'    => 39,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 40,
                'title' => 'payment_access',
            ],
            [
                'id'    => 41,
                'title' => 'payment_account_create',
            ],
            [
                'id'    => 42,
                'title' => 'payment_account_edit',
            ],
            [
                'id'    => 43,
                'title' => 'payment_account_show',
            ],
            [
                'id'    => 44,
                'title' => 'payment_account_delete',
            ],
            [
                'id'    => 45,
                'title' => 'payment_account_access',
            ],
            [
                'id'    => 46,
                'title' => 'delivery_management_access',
            ],
            [
                'id'    => 47,
                'title' => 'payment_status_create',
            ],
            [
                'id'    => 48,
                'title' => 'payment_status_edit',
            ],
            [
                'id'    => 49,
                'title' => 'payment_status_show',
            ],
            [
                'id'    => 50,
                'title' => 'payment_status_delete',
            ],
            [
                'id'    => 51,
                'title' => 'payment_status_access',
            ],
            [
                'id'    => 52,
                'title' => 'delivery_create',
            ],
            [
                'id'    => 53,
                'title' => 'delivery_edit',
            ],
            [
                'id'    => 54,
                'title' => 'delivery_show',
            ],
            [
                'id'    => 55,
                'title' => 'delivery_delete',
            ],
            [
                'id'    => 56,
                'title' => 'delivery_access',
            ],
            [
                'id'    => 57,
                'title' => 'system_calendar_access',
            ],
            [
                'id'    => 58,
                'title' => 'course_create',
            ],
            [
                'id'    => 59,
                'title' => 'course_edit',
            ],
            [
                'id'    => 60,
                'title' => 'course_show',
            ],
            [
                'id'    => 61,
                'title' => 'course_delete',
            ],
            [
                'id'    => 62,
                'title' => 'course_access',
            ],
            [
                'id'    => 63,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 64,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 65,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 66,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 67,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 68,
                'title' => 'test_create',
            ],
            [
                'id'    => 69,
                'title' => 'test_edit',
            ],
            [
                'id'    => 70,
                'title' => 'test_show',
            ],
            [
                'id'    => 71,
                'title' => 'test_delete',
            ],
            [
                'id'    => 72,
                'title' => 'test_access',
            ],
            [
                'id'    => 73,
                'title' => 'question_create',
            ],
            [
                'id'    => 74,
                'title' => 'question_edit',
            ],
            [
                'id'    => 75,
                'title' => 'question_show',
            ],
            [
                'id'    => 76,
                'title' => 'question_delete',
            ],
            [
                'id'    => 77,
                'title' => 'question_access',
            ],
            [
                'id'    => 78,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 79,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 80,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 81,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 82,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 83,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 84,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 85,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 86,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 87,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 88,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 89,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 90,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 91,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 92,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 93,
                'title' => 'curriculum_management_access',
            ],
            [
                'id'    => 94,
                'title' => 'assignment_management_access',
            ],
            [
                'id'    => 95,
                'title' => 'assignment_create',
            ],
            [
                'id'    => 96,
                'title' => 'assignment_edit',
            ],
            [
                'id'    => 97,
                'title' => 'assignment_show',
            ],
            [
                'id'    => 98,
                'title' => 'assignment_delete',
            ],
            [
                'id'    => 99,
                'title' => 'assignment_access',
            ],
            [
                'id'    => 100,
                'title' => 'solved_assignment_access',
            ],
            [
                'id'    => 101,
                'title' => 'category_create',
            ],
            [
                'id'    => 102,
                'title' => 'category_edit',
            ],
            [
                'id'    => 103,
                'title' => 'category_show',
            ],
            [
                'id'    => 104,
                'title' => 'category_delete',
            ],
            [
                'id'    => 105,
                'title' => 'category_access',
            ],
            [
                'id'    => 106,
                'title' => 'browse_assignment_create',
            ],
            [
                'id'    => 107,
                'title' => 'browse_assignment_edit',
            ],
            [
                'id'    => 108,
                'title' => 'browse_assignment_show',
            ],
            [
                'id'    => 109,
                'title' => 'browse_assignment_delete',
            ],
            [
                'id'    => 110,
                'title' => 'browse_assignment_access',
            ],
            [
                'id'    => 111,
                'title' => 'research_library_access',
            ],
            [
                'id'    => 112,
                'title' => 'journal_detail_create',
            ],
            [
                'id'    => 113,
                'title' => 'journal_detail_edit',
            ],
            [
                'id'    => 114,
                'title' => 'journal_detail_show',
            ],
            [
                'id'    => 115,
                'title' => 'journal_detail_delete',
            ],
            [
                'id'    => 116,
                'title' => 'journal_detail_access',
            ],
            [
                'id'    => 117,
                'title' => 'author_detail_create',
            ],
            [
                'id'    => 118,
                'title' => 'author_detail_edit',
            ],
            [
                'id'    => 119,
                'title' => 'author_detail_show',
            ],
            [
                'id'    => 120,
                'title' => 'author_detail_delete',
            ],
            [
                'id'    => 121,
                'title' => 'author_detail_access',
            ],
            [
                'id'    => 122,
                'title' => 'publisher_create',
            ],
            [
                'id'    => 123,
                'title' => 'publisher_edit',
            ],
            [
                'id'    => 124,
                'title' => 'publisher_show',
            ],
            [
                'id'    => 125,
                'title' => 'publisher_delete',
            ],
            [
                'id'    => 126,
                'title' => 'publisher_access',
            ],
            [
                'id'    => 127,
                'title' => 'search_article_create',
            ],
            [
                'id'    => 128,
                'title' => 'search_article_edit',
            ],
            [
                'id'    => 129,
                'title' => 'search_article_show',
            ],
            [
                'id'    => 130,
                'title' => 'search_article_delete',
            ],
            [
                'id'    => 131,
                'title' => 'search_article_access',
            ],
            [
                'id'    => 132,
                'title' => 'keyword_create',
            ],
            [
                'id'    => 133,
                'title' => 'keyword_edit',
            ],
            [
                'id'    => 134,
                'title' => 'keyword_show',
            ],
            [
                'id'    => 135,
                'title' => 'keyword_delete',
            ],
            [
                'id'    => 136,
                'title' => 'keyword_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
