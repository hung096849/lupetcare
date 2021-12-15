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
            ['id' => 1, 'name' => 'Chăm sóc cơ bản', 'slug' => 'cham-soc-co-ban', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 2, 'name' => 'Vệ sinh', 'slug' => 've-sinh', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 3, 'name' => 'Chăm sóc nâng cao', 'slug' => 'cham-soc-nang-cao', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 4, 'name' => 'Làm đẹp', 'slug' => 'lam-dep', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 5, 'name' => 'Combo', 'slug' => 'combo', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
        ]);
    }
}
