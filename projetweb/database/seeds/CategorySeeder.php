<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'category_name' => 'Xbox',
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'category_name' => 'Playstation',
        ]);

        DB::table('categories')->insert([
            'id' => 3,
            'category_name' => 'Steam',
        ]);

        DB::table('categories')->insert([
            'id' => 4,
            'category_name' => 'Epic Games',
        ]);

        DB::table('categories')->insert([
            'id' => 5,
            'category_name' => 'Battle.net',
        ]);

        DB::table('categories')->insert([
            'id' => 6,
            'category_name' => 'Switch',
        ]);

        DB::table('categories')->insert([
            'id' => 7,
            'category_name' => 'Uplay',
        ]);

        DB::table('categories')->insert([
            'id' => 8,
            'category_name' => 'Origin',
        ]);

        DB::table('categories')->insert([
            'id' => 9,
            'category_name' => 'Rockstar',
        ]);
    }
}
