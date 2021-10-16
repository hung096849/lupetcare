<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            ['id' => 1, 'category_id' => 1, 'image' => 'image 1', 'service_name' => 'services 1', 'slug' => 'services-1', 'price' => '1', 'price_sale'=>"1", 'detail'=> 'services-1', 'description'=> 'services-1', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 2, 'category_id' => 2, 'image' => 'image 2', 'service_name' => 'services 2', 'slug' => 'services-2', 'price' => '1', 'price_sale'=>"2", 'detail'=> 'services-2', 'description'=> 'services-2', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 3, 'category_id' => 3, 'image' => 'image 3', 'service_name' => 'services 3', 'slug' => 'services-3', 'price' => '1', 'price_sale'=>"3", 'detail'=> 'services-3', 'description'=> 'services-3', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 4, 'category_id' => 4, 'image' => 'image 4', 'service_name' => 'services 4', 'slug' => 'services-4', 'price' => '1', 'price_sale'=>"4", 'detail'=> 'services-4', 'description'=> 'services-4', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
        ]);
    }
}
