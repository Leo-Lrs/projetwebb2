<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'product_name' => 'GTA',
            'product_description' => 'Grand theft auto',
            'product_price' => 60,
            'product_code' => 'ABCDE-TYUE3-17V8Y-TPF4Y-GPT9Y',
            'product_quantite' => 30,
            'product_image' => 'noimage.jpg',
            'status' => 1,
        ]);

        DB::table('category_product')->insert([
            'id' => 1,
            'category_id' => 1,
            'product_id' => 1,
        ]);

        DB::table('category_product')->insert([
            'id' => 2,
            'category_id' => 2,
            'product_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'product_name' => 'Halo Reach',
            'product_description' => 'Halo: Reach est un jeu vidéo de tir à la première personne développé par Bungie et édité par Microsoft. Officiellement dévoilé lors de la conférence Microsoft de l E3 2009, le jeu est sorti en septembre 2010 au niveau mondial exclusivement sur Xbox 360.',
            'product_price' => 50,
            'product_code' => 'QYU5A-TYUE3-17V8Y-TPF4Y-547YT',
            'product_quantite' => 100,
            'product_image' => 'noimage.jpg',
            'status' => 1,
        ]);

        DB::table('category_product')->insert([
            'id' => 3,
            'category_id' => 1,
            'product_id' => 2,
        ]);

        DB::table('category_product')->insert([
            'id' => 4,
            'category_id' => 2,
            'product_id' => 2,
        ]);

        DB::table('category_product')->insert([
            'id' => 5,
            'category_id' => 7,
            'product_id' => 2,
        ]);

        DB::table('category_product')->insert([
            'id' => 6,
            'category_id' => 4,
            'product_id' => 2,
        ]);

        DB::table('products')->insert([
            'id' => 3,
            'product_name' => 'Counter-Strike : GO',
            'product_description' => 'Jeu de tir à la première personne.',
            'product_price' => 20,
            'product_code' => 'YUTH2-TYUE3-87RTY-TPF4Y-WUYZA',
            'product_quantite' => 10,
            'product_image' => 'noimage.jpg',
            'status' => 1,
        ]);

        DB::table('category_product')->insert([
            'id' => 7,
            'category_id' => 8,
            'product_id' => 3,
        ]);

        DB::table('category_product')->insert([
            'id' => 8,
            'category_id' => 7,
            'product_id' => 3,
        ]);

        DB::table('category_product')->insert([
            'id' => 9,
            'category_id' => 5,
            'product_id' => 3,
        ]);

        DB::table('category_product')->insert([
            'id' => 10,
            'category_id' => 3,
            'product_id' => 3,
        ]);

        DB::table('products')->insert([
            'id' => 6,
            'product_name' => 'Euro Truck Simulator 2',
            'product_description' => 'Euro Truck Simulator 2 est un jeu de simulation de poids lourd et la suite d Euro Truck Simulator développé par SCS Software pour Windows, Linux et Mac OS; sorti le 19 octobre 2012. Il place le joueur dans la peau d un routier devant effectuer des livraisons de diverses marchandises dans plusieurs villes d Europe.',
            'product_price' => 10,
            'product_code' => 'YUTH2-TYUE3-87RTY-TPF4Y-WUYZA',
            'product_quantite' => 5,
            'product_image' => 'noimage.jpg',
            'status' => 1,
        ]);

        DB::table('category_product')->insert([
            'id' => 11,
            'category_id' => 2,
            'product_id' => 6,
        ]);

        DB::table('category_product')->insert([
            'id' => 12,
            'category_id' => 7,
            'product_id' => 6,
        ]);

        DB::table('products')->insert([
            'id' => 4,
            'product_name' => 'Farming Simulator',
            'product_description' => 'Farming Simulator est une série de jeux vidéo de simulation développés par la société suisse Giants Software, et édités par la société française Focus Home Interactive de 2008 à 2020.',
            'product_price' => 45,
            'product_code' => 'YUTH2-TYUE3-87RTY-TPF4Y-WUYZA',
            'product_quantite' => 147,
            'product_image' => 'noimage.jpg',
            'status' => 1,
        ]);

        DB::table('category_product')->insert([
            'id' => 13,
            'category_id' => 3,
            'product_id' => 4,
        ]);

        DB::table('category_product')->insert([
            'id' => 14,
            'category_id' => 1,
            'product_id' => 4,
        ]);

        DB::table('products')->insert([
            'id' => 5,
            'product_name' => 'yberpunk 2077',
            'product_description' => 'Cyberpunk 2077 est un jeu vidéo d action-RPG en vue à la première personne développé par CD Projekt RED, fondé sur la série de jeu de rôle sur table Cyberpunk 2020 conçue par Mike Pondsmith.',
            'product_price' => 80,
            'product_code' => 'YUTH2-TYUE3-87RTY-TPF4Y-WUYZA',
            'product_quantite' => 37,
            'product_image' => 'noimage.jpg',
            'status' => 1,
        ]);

        DB::table('category_product')->insert([
            'id' => 15,
            'category_id' => 5,
            'product_id' => 5,
        ]);
    }
}
