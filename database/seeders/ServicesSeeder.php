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
        $imgOne = '<img alt="" src="'.asset('frontend/images/img-cate-1.png').'" />';
        $imgTwo = '<img alt="" src="'.asset('frontend/images/img-cate-2.png').'" />';
        $imgThree = '<img alt="" src="'.asset('frontend/images/img-cate-3.png').'" />';
        $imgFour = '<img alt="" src="'.asset('frontend/images/img-cate-4.png').'" />';
        $imFive = '<img alt="" src="'.asset('frontend/images/img-cate-5.png').'" />';

        DB::table('services')->insert([
            ['id' => 1, 'category_id' => 1, 'image' => $imgOne, 'service_name' => 'services 1', 'slug' => 'services-1', 'time' => '30 phút', 'price' => '20000', 'status' => 0, 'price_sale'=>"8000", 'detail'=> 'services-1', 'description'=> 'services-1', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 2, 'category_id' => 2, 'image' => $imgTwo, 'service_name' => 'services 2', 'slug' => 'services-2', 'time' => '30 phút', 'price' => '30000', 'status' => 0, 'price_sale'=>"16000", 'detail'=> 'services-2', 'description'=> 'services-2', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 3, 'category_id' => 3, 'image' => $imgThree, 'service_name' => 'services 3', 'slug' => 'services-3', 'time' => '30 phút', 'price' => '40000', 'status' => 0, 'price_sale'=>"24000", 'detail'=> 'services-3', 'description'=> 'services-3', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 4, 'category_id' => 4, 'image' => $imgFour, 'service_name' => 'services 4', 'slug' => 'services-4', 'time' => '30 phút', 'price' => '50000', 'status' => 0, 'price_sale'=>"32000", 'detail'=> 'services-4', 'description'=> 'services-4', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 5, 'category_id' => 1, 'image' => $imFive, 'service_name' => 'services 5', 'slug' => 'services-5', 'time' => '30 phút', 'price' => '60000', 'status' => 1, 'price_sale'=>"32000", 'detail'=> 'services-5', 'description'=> 'services-5', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 6, 'category_id' => 2, 'image' => $imgOne, 'service_name' => 'services 6', 'slug' => 'services-6', 'time' => '30 phút', 'price' => '60000', 'status' => 1, 'price_sale'=>"32000", 'detail'=> 'services-6', 'description'=> 'services-6', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 7, 'category_id' => 3, 'image' => $imgTwo, 'service_name' => 'services 7', 'slug' => 'services-7', 'time' => '30 phút', 'price' => '60000', 'status' => 1, 'price_sale'=>"32000", 'detail'=> 'services-7', 'description'=> 'services-7', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
            ['id' => 8, 'category_id' => 4, 'image' => $imgTwo, 'service_name' => 'services 8', 'slug' => 'services-8', 'time' => '30 phút', 'price' => '60000', 'status' => 1, 'price_sale'=>"32000", 'detail'=> 'services-8', 'description'=> 'services-8', 'delete_at' => null , 'created_at' => '2021-08-19 10:28:00', 'updated_at' => '2021-08-19 10:28:00'],
        ]);
    }
}
