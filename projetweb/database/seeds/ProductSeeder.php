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
    }
}
