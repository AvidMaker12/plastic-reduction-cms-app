<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Empty tables upon 'migrate refresh' command to prevent continuously adding to seeded data. //
        User::truncate();
        PlasticProduct::truncate(); // Table foreign keys connections: users

        
        // Seed data to tables. //
        /* NOTE: Ensure order of listed tables below are such that foreign key dependencies are positioned further below.
         * Example: 'client_accounts' table has foreign key data from 'scores' table, therefore 'scores' table is listed first above 'client_accounts' table.
        */
        
        User::factory()->count(4)->create();
        PlasticProduct::factory()->count(4)->create(); // Table foreign keys connections: users

        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
