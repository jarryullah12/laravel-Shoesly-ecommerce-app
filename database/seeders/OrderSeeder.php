<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing orders
        DB::table('orders')->truncate();
        
        // Get existing user IDs
        $userIds = DB::table('users')->pluck('id')->toArray();
        
        // Get existing product IDs
        $productIds = DB::table('products')->pluck('id')->toArray();
        
        // Generate random orders
        $orders = [];
        $statuses = ['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled'];
        $paymentStatuses = ['Paid', 'Pending', 'Failed', 'Refunded'];
        $paymentMethods = ['Credit Card', 'PayPal', 'Cash on Delivery', 'Bank Transfer'];
        
        // Generate 20 random orders
        for ($i = 0; $i < 20; $i++) {
            $userId = $userIds[array_rand($userIds)];
            $productId = $productIds[array_rand($productIds)];
            
            // Random status
            $status = $statuses[array_rand($statuses)];
            
            // Random payment status
            $paymentStatus = $paymentStatuses[array_rand($paymentStatuses)];
            
            // Random payment method
            $paymentMethod = $paymentMethods[array_rand($paymentMethods)];
            
            // Random date within the last 30 days
            $date = Carbon::now()->subDays(rand(1, 30))->format('Y-m-d H:i:s');
            
            // Generate a random address
            $address = rand(1, 999) . ' ' . ['Main St', 'Park Ave', 'Broadway', 'Elm St', 'Oak Lane'][array_rand(['Main St', 'Park Ave', 'Broadway', 'Elm St', 'Oak Lane'])] . ', ' 
                     . ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix'][array_rand(['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix'])] . ', '
                     . ['NY', 'CA', 'IL', 'TX', 'AZ'][array_rand(['NY', 'CA', 'IL', 'TX', 'AZ'])] . ' ' 
                     . rand(10000, 99999);
            
            $orders[] = [
                'user_id' => $userId,
                'product_id' => $productId,
                'status' => $status,
                'payment_status' => $paymentStatus,
                'payment_method' => $paymentMethod,
                'address' => $address,
                'created_at' => $date,
                'updated_at' => $date
            ];
        }
        
        DB::table('orders')->insert($orders);
    }
}