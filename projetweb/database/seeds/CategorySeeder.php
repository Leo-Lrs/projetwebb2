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
    }
}
