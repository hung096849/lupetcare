<?php

namespace Database\Factories;

use App\Models\CategoriesServices;
use App\Models\Services;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Services::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "service_name" => $this->faker->name(),
            "category_id" => CategoriesServices::all()->random()->id,
            "image" => "img",
            "price" => rand(1, 2000),
            "price_sale" => rand(1500, 2000),
            "quantity" => rand(1, 200),
            "detail" => $this->faker->text(),
            "description" => $this->faker->text(),
            'time' => rand(1, 200),
            'slug' => $this->faker->name(),
            "status" => rand(0, 1),
        ];
    }
}
