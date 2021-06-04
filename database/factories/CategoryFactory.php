<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    
    return [
        'title' => $this->faker->name,
        'title_gr' => $this->faker->name,
        'slug' => $this->faker->slug,
        // 'image_url' => $faker->image('storage/app/public/faker-images',400,300),
        'status' => $this->faker->boolean,
    ];
});
