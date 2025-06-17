<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        
        // Call all seeders
        $this->call([
            Productseeder::class,
            User_seeder::class,
            CollectionSeeder::class,
            UsersTableSeeder::class,
            AdminSeeder::class,
            // membersSeeder is commented out as it has no active seeding code
            // membersSeeder::class,
        ]);
    }
}
