<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_services')->insert([
            ['id' => 1, 'name' => 'categories 1', 'slug' => 'categories-1', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 2, 'name' => 'categories 2', 'slug' => 'categories-2', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 3, 'name' => 'categories 3', 'slug' => 'categories-3', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 4, 'name' => 'categories 4', 'slug' => 'categories-4', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
        ]);
    }
}
