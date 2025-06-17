<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class membersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if members table exists
        try {
            // Only attempt to seed if the table exists
            if (Schema::hasTable('members')) {
                // Clear existing members
                DB::table('members')->truncate();
                
                // Array of member data
                $members = [
                    [
                        'name' => 'Gold Member',
                        'email' => 'gold@example.com'
                    ],
                    [
                        'name' => 'Silver Member',
                        'email' => 'silver@example.com'
                    ],
                    [
                        'name' => 'Bronze Member',
                        'email' => 'bronze@example.com'
                    ]
                ];
                
                // Insert member data
                DB::table('members')->insert($members);
            }
        } catch (\Exception $e) {
            // Just skip if there's an issue
}
    }
}