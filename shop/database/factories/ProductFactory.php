<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Halo reach', 'Counter Strike : Global Offensive', 'Euro Truck Simulator 2', 'Mudrunner', 'Borderlands 3', 'Cyberpunk 2077', 'Hitman 3', 'Mario Bros', 'Fortnite', "Assassin's Creed Valhalla", 'Fifa 21', 'Resident Evil Village', 'Phasmophobia', 'Monster Hunter Rise', 'Call of Duty : Black Ops', 'World of Warcraft', 'Microsoft Flight Simulator', 'Ghost of Tsushima', 'League of Legends', 'Super Meat Boy Forever', 'The Last of Us Part II', 'Halo Infinite', 'Hades', 'Mass Effect : Legendary Edition', 'Seafight', 'Destiny 2', 'Football Manager 2021', 'Watch Dogs Legion', 'Fall Guys', 'Valorant', 'Ark', 'WRC', 'Farming Simulator 19']),
        'price' => mt_rand(100, 1000) / 10.0,
        'quantity' => 50,
        'code' => $faker->macAddress(),
        'active' => $faker->boolean(),
        'image' => $faker->randomElement(['cs_go.png', 'halo_reach.jpg', 'ets2.jpg', 'mudrunner.jpg', 'borderlands3.jpg', 'cyberpunk2077.jpg', 'hitman3.jpg', 'New-Super-Mario-Bros-U-Deluxe-Nintendo-Switch.jpg', 'acv.jpg', 'FIFA21.jpg', 'call-of-duty-black-ops-cover.jpg', 'WoW.jpg', 'halo_infinite.png', 'smbf.jpg']),
        'description' => $faker->paragraph(),
    ];
});
