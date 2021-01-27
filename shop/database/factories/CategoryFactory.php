<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->randomElement(['Activision', 'Atari', 'Bandai', 'Bethesda', 'Blizzard', 'Bohemia', 'Capcom', 'Electronic Arts', 'Hasbro', 'Konami', 'Lego', 'Microsoft', 'Mindscape', 'Nintendo', 'Rockstar Games', 'Sega', 'Sony', 'Square Enix', 'Take-Two', 'Ubisoft']);
    return [
        'name' => $name,
        'slug' => Str::slug($name),
    ];
});
