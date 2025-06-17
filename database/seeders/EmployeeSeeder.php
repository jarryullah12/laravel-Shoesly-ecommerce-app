<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing employees
        DB::table('employees')->truncate();
        
        // Array of employee data
        $employees = [
            [
                'name' => 'John Manager',
                'email' => 'manager@shoesly.com',
                'password' => Hash::make('password123'),
                'position' => 'Store Manager',
                'department' => 'Management',
                'hire_date' => '2020-01-15',
                'salary' => 65000
            ],
            [
                'name' => 'Sarah Sales',
                'email' => 'sales1@shoesly.com',
                'password' => Hash::make('password123'),
                'position' => 'Sales Associate',
                'department' => 'Sales',
                'hire_date' => '2021-03-10',
                'salary' => 35000
            ],
            [
                'name' => 'Mike Inventory',
                'email' => 'inventory@shoesly.com',
                'password' => Hash::make('password123'),
                'position' => 'Inventory Manager',
                'department' => 'Warehouse',
                'hire_date' => '2020-06-22',
                'salary' => 48000
            ],
            [
                'name' => 'Lisa Customer',
                'email' => 'support@shoesly.com',
                'password' => Hash::make('password123'),
                'position' => 'Customer Support',
                'department' => 'Support',
                'hire_date' => '2021-11-05',
                'salary' => 38000
            ],
            [
                'name' => 'David Marketing',
                'email' => 'marketing@shoesly.com',
                'password' => Hash::make('password123'),
                'position' => 'Marketing Specialist',
                'department' => 'Marketing',
                'hire_date' => '2022-02-15',
                'salary' => 45000
            ],
            [
                'name' => 'Emma Sales',
                'email' => 'sales2@shoesly.com',
                'password' => Hash::make('password123'),
                'position' => 'Senior Sales Associate',
                'department' => 'Sales',
                'hire_date' => '2019-08-30',
                'salary' => 42000
            ],
            [
                'name' => 'Tom IT',
                'email' => 'it@shoesly.com',
                'password' => Hash::make('password123'),
                'position' => 'IT Support',
                'department' => 'IT',
                'hire_date' => '2021-04-18',
                'salary' => 52000
            ]
        ];
        
        // Insert employee data
        DB::table('employees')->insert($employees);
    }
}