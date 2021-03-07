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
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 29,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 31,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 33,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 34,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 35,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 36,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 37,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 38,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 39,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 40,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 41,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 42,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 43,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 44,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 45,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 46,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 47,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 48,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 49,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 50,
                'title' => 'expense_create',
            ],
            [
                'id'    => 51,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 52,
                'title' => 'expense_show',
            ],
            [
                'id'    => 53,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 54,
                'title' => 'expense_access',
            ],
            [
                'id'    => 55,
                'title' => 'income_create',
            ],
            [
                'id'    => 56,
                'title' => 'income_edit',
            ],
            [
                'id'    => 57,
                'title' => 'income_show',
            ],
            [
                'id'    => 58,
                'title' => 'income_delete',
            ],
            [
                'id'    => 59,
                'title' => 'income_access',
            ],
            [
                'id'    => 60,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 61,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 62,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 63,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 64,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 65,
                'title' => 'subject_create',
            ],
            [
                'id'    => 66,
                'title' => 'subject_edit',
            ],
            [
                'id'    => 67,
                'title' => 'subject_show',
            ],
            [
                'id'    => 68,
                'title' => 'subject_delete',
            ],
            [
                'id'    => 69,
                'title' => 'subject_access',
            ],
            [
                'id'    => 70,
                'title' => 'degree_create',
            ],
            [
                'id'    => 71,
                'title' => 'degree_edit',
            ],
            [
                'id'    => 72,
                'title' => 'degree_show',
            ],
            [
                'id'    => 73,
                'title' => 'degree_delete',
            ],
            [
                'id'    => 74,
                'title' => 'degree_access',
            ],
            [
                'id'    => 75,
                'title' => 'batch_create',
            ],
            [
                'id'    => 76,
                'title' => 'batch_edit',
            ],
            [
                'id'    => 77,
                'title' => 'batch_show',
            ],
            [
                'id'    => 78,
                'title' => 'batch_delete',
            ],
            [
                'id'    => 79,
                'title' => 'batch_access',
            ],
            [
                'id'    => 80,
                'title' => 'student_create',
            ],
            [
                'id'    => 81,
                'title' => 'student_edit',
            ],
            [
                'id'    => 82,
                'title' => 'student_show',
            ],
            [
                'id'    => 83,
                'title' => 'student_delete',
            ],
            [
                'id'    => 84,
                'title' => 'student_access',
            ],
            [
                'id'    => 85,
                'title' => 'fees_management_access',
            ],
            [
                'id'    => 86,
                'title' => 'fee_type_create',
            ],
            [
                'id'    => 87,
                'title' => 'fee_type_edit',
            ],
            [
                'id'    => 88,
                'title' => 'fee_type_show',
            ],
            [
                'id'    => 89,
                'title' => 'fee_type_delete',
            ],
            [
                'id'    => 90,
                'title' => 'fee_type_access',
            ],
            [
                'id'    => 91,
                'title' => 'fee_create',
            ],
            [
                'id'    => 92,
                'title' => 'fee_edit',
            ],
            [
                'id'    => 93,
                'title' => 'fee_show',
            ],
            [
                'id'    => 94,
                'title' => 'fee_delete',
            ],
            [
                'id'    => 95,
                'title' => 'fee_access',
            ],
            [
                'id'    => 96,
                'title' => 'instalment_create',
            ],
            [
                'id'    => 97,
                'title' => 'instalment_edit',
            ],
            [
                'id'    => 98,
                'title' => 'instalment_show',
            ],
            [
                'id'    => 99,
                'title' => 'instalment_delete',
            ],
            [
                'id'    => 100,
                'title' => 'instalment_access',
            ],
            [
                'id'    => 101,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 102,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 103,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 104,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 105,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 106,
                'title' => 'noticeboard_create',
            ],
            [
                'id'    => 107,
                'title' => 'noticeboard_edit',
            ],
            [
                'id'    => 108,
                'title' => 'noticeboard_show',
            ],
            [
                'id'    => 109,
                'title' => 'noticeboard_delete',
            ],
            [
                'id'    => 110,
                'title' => 'noticeboard_access',
            ],
            [
                'id'    => 111,
                'title' => 'student_notification_access',
            ],
            [
                'id'    => 112,
                'title' => 'attendance_notification_access',
            ],
            [
                'id'    => 113,
                'title' => 'date_sheet_notification_access',
            ],
            [
                'id'    => 114,
                'title' => 'notification_create',
            ],
            [
                'id'    => 115,
                'title' => 'notification_edit',
            ],
            [
                'id'    => 116,
                'title' => 'notification_show',
            ],
            [
                'id'    => 117,
                'title' => 'notification_delete',
            ],
            [
                'id'    => 118,
                'title' => 'notification_access',
            ],
            [
                'id'    => 119,
                'title' => 'result_notification_access',
            ],
            [
                'id'    => 120,
                'title' => 'home_slider_create',
            ],
            [
                'id'    => 121,
                'title' => 'home_slider_edit',
            ],
            [
                'id'    => 122,
                'title' => 'home_slider_show',
            ],
            [
                'id'    => 123,
                'title' => 'home_slider_delete',
            ],
            [
                'id'    => 124,
                'title' => 'home_slider_access',
            ],
            [
                'id'    => 125,
                'title' => 'faq_create',
            ],
            [
                'id'    => 126,
                'title' => 'faq_edit',
            ],
            [
                'id'    => 127,
                'title' => 'faq_show',
            ],
            [
                'id'    => 128,
                'title' => 'faq_delete',
            ],
            [
                'id'    => 129,
                'title' => 'faq_access',
            ],
            [
                'id'    => 130,
                'title' => 'team_memeber_create',
            ],
            [
                'id'    => 131,
                'title' => 'team_memeber_edit',
            ],
            [
                'id'    => 132,
                'title' => 'team_memeber_show',
            ],
            [
                'id'    => 133,
                'title' => 'team_memeber_delete',
            ],
            [
                'id'    => 134,
                'title' => 'team_memeber_access',
            ],
            [
                'id'    => 135,
                'title' => 'service_create',
            ],
            [
                'id'    => 136,
                'title' => 'service_edit',
            ],
            [
                'id'    => 137,
                'title' => 'service_show',
            ],
            [
                'id'    => 138,
                'title' => 'service_delete',
            ],
            [
                'id'    => 139,
                'title' => 'service_access',
            ],
            [
                'id'    => 140,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 141,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 142,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 143,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 144,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 145,
                'title' => 'setting_create',
            ],
            [
                'id'    => 146,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 147,
                'title' => 'setting_show',
            ],
            [
                'id'    => 148,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 149,
                'title' => 'setting_access',
            ],
            [
                'id'    => 150,
                'title' => 'study_material_create',
            ],
            [
                'id'    => 151,
                'title' => 'study_material_edit',
            ],
            [
                'id'    => 152,
                'title' => 'study_material_show',
            ],
            [
                'id'    => 153,
                'title' => 'study_material_delete',
            ],
            [
                'id'    => 154,
                'title' => 'study_material_access',
            ],
            [
                'id'    => 155,
                'title' => 'event_create',
            ],
            [
                'id'    => 156,
                'title' => 'event_edit',
            ],
            [
                'id'    => 157,
                'title' => 'event_show',
            ],
            [
                'id'    => 158,
                'title' => 'event_delete',
            ],
            [
                'id'    => 159,
                'title' => 'event_access',
            ],
            [
                'id'    => 160,
                'title' => 'report_access',
            ],
            [
                'id'    => 161,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
