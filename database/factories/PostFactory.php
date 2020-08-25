<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
    	'user_id' 		=> rand(1,10),
    	'category_id' 	=> rand(1,10),
        'name' 			=> $title,
        'slug' 			=> Str::slug($title, '-'),
        'excerpt' 		=> $faker->text(100),
        'description' 	=> $faker->text(100),
        'status'		=> $faker->randomElement(['DRAFT','PUBLISHER']),    
    ];
});
