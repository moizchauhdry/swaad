<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => $this->faker->numberBetween(1,30),
        'title' => $this->faker->name,
        'title_gr' => $this->faker->name,
        'price' => $this->faker->numberBetween(0,500),
        'description' => $this->faker->slug,
        'description_gr' => $this->faker->slug,
        'status' => $this->faker->boolean,
        'view_count' => $this->faker->numberBetween(0,1000),
        'spice_level' =>$this->faker->numberBetween(0,2),
    ];
});
