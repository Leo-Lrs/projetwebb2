<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'id' => 1,
            'email' => 'test@test.fr',
            'password' => '$2y$10$AsoSr3BDWYWkuDP8uLkpxOuAfBbQ8brP7LRC3TXHATKxamWmiOThK',
        ]);
    }
}
