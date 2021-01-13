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
            'product_description' => 'Jeu de guerre interstellaire.',
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
    }
}
