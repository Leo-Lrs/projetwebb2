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

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Pierre Da Silva',
            'email' => 'pierre@pierre.fr',
            'password' => '$2y$10$J8ivn.7LXJ/ZNpNFAoM0U.9oXZBgwUNM71cK68RaisS675lHDesxi',
        ]);
    }
}
