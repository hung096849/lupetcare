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
            
            // ['id' => 16, 'name' => 'news', 'slug' => PermissionConstant::NEWS_PERMISSION_LIST, 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],

        ]);
    }
}
