<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Constant\PermissionConstant;

class PermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['id' => 1, 'name' => 'users', 'slug' => PermissionConstant::USER_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 2, 'name' => 'users', 'slug' => PermissionConstant::USER_PERMISSION_VIEW, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 3, 'name' => 'users', 'slug' => PermissionConstant::USER_PERMISSION_EDIT, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 4, 'name' => 'users', 'slug' => PermissionConstant::USER_PERMISSION_DELETE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 5, 'name' => 'users', 'slug' => PermissionConstant::USER_PERMISSION_CREATE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 6, 'name' => 'roles', 'slug' => PermissionConstant::ROLE_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 7, 'name' => 'roles', 'slug' => PermissionConstant::ROLE_PERMISSION_VIEW, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 8, 'name' => 'roles', 'slug' => PermissionConstant::ROLE_PERMISSION_EDIT, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 9, 'name' => 'roles', 'slug' => PermissionConstant::ROLE_PERMISSION_DELETE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 10, 'name' => 'roles', 'slug' => PermissionConstant::ROLE_PERMISSION_CREATE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 11, 'name' => 'customers', 'slug' => PermissionConstant::CUSTOMER_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 12, 'name' => 'customers', 'slug' => PermissionConstant::CUSTOMER_PERMISSION_VIEW, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 13, 'name' => 'customers', 'slug' => PermissionConstant::CUSTOMER_PERMISSION_EDIT, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 14, 'name' => 'customers', 'slug' => PermissionConstant::CUSTOMER_PERMISSION_DELETE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 15, 'name' => 'customers', 'slug' => PermissionConstant::CUSTOMER_PERMISSION_CREATE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],

            ['id' => 16, 'name' => 'categories', 'slug' => PermissionConstant::CATEGORIES_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 17, 'name' => 'categories', 'slug' => PermissionConstant::CATEGORIES_PERMISSION_EDIT, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 18, 'name' => 'categories', 'slug' => PermissionConstant::CATEGORIES_PERMISSION_CREATE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 19, 'name' => 'categories', 'slug' => PermissionConstant::CATEGORIES_PERMISSION_VIEW, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 20, 'name' => 'categories', 'slug' => PermissionConstant::CATEGORIES_PERMISSION_DELETE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],

            ['id' => 21, 'name' => 'services', 'slug' => PermissionConstant::SERVICES_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 22, 'name' => 'services', 'slug' => PermissionConstant::SERVICES_PERMISSION_EDIT, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 23, 'name' => 'services', 'slug' => PermissionConstant::SERVICES_PERMISSION_CREATE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 24, 'name' => 'services', 'slug' => PermissionConstant::SERVICES_PERMISSION_VIEW, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 25, 'name' => 'services', 'slug' => PermissionConstant::SERVICES_PERMISSION_DELETE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],

            ['id' => 26, 'name' => 'news', 'slug' => PermissionConstant::NEWS_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 27, 'name' => 'news', 'slug' => PermissionConstant::NEWS_PERMISSION_EDIT, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 28, 'name' => 'news', 'slug' => PermissionConstant::NEWS_PERMISSION_CREATE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 29, 'name' => 'news', 'slug' => PermissionConstant::NEWS_PERMISSION_VIEW, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 30, 'name' => 'news', 'slug' => PermissionConstant::NEWS_PERMISSION_DELETE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],

            ['id' => 31, 'name' => 'comments', 'slug' => PermissionConstant::COMMENTS_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 32, 'name' => 'comments', 'slug' => PermissionConstant::COMMENTS_PERMISSION_EDIT, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],

            ['id' => 33, 'name' => 'contatcs', 'slug' => PermissionConstant::CONTATCS_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 34, 'name' => 'contatcs', 'slug' => PermissionConstant::CONTACTS_PERMISSION_DELETE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 35, 'name' => 'contatcs', 'slug' => PermissionConstant::CONTACTS_PERMISSION_VIEW, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],

            ['id' => 36, 'name' => 'sms', 'slug' => PermissionConstant::SMS_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 37, 'name' => 'sms', 'slug' => PermissionConstant::SMS_PERMISSION_DELETE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 38, 'name' => 'sms', 'slug' => PermissionConstant::SMS_PERMISSION_VIEW, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],

            ['id' => 39, 'name' => 'petInformartion', 'slug' => PermissionConstant::PETINFORMARTION_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 40, 'name' => 'petInformartion', 'slug' => PermissionConstant::PETINFORMARTION_PERMISSION_EDIT, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 41, 'name' => 'petInformartion', 'slug' => PermissionConstant::PETINFORMARTION_PERMISSION_CREATE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 42, 'name' => 'petInformartion', 'slug' => PermissionConstant::PETINFORMARTION_PERMISSION_VIEW, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 43, 'name' => 'petInformartion', 'slug' => PermissionConstant::PETINFORMARTION_PERMISSION_DELETE, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],

            ['id' => 44, 'name' => 'recurringEvents', 'slug' => PermissionConstant::RECURRINGEVENTS_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],

        ]);
    }
}
