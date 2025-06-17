<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=laravel', 'root', '');
    $stmt = $pdo->query('SELECT COUNT(*) FROM orders');
    echo 'Number of orders: ' . $stmt->fetchColumn() . "\n";
    
    // Check if there are any orders with valid product_id and user_id
    $stmt = $pdo->query('SELECT * FROM orders LIMIT 5');
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($orders) > 0) {
        echo "Sample orders data:\n";
        foreach ($orders as $order) {
            echo "ID: {$order['id']}, Product ID: {$order['product_id']}, User ID: {$order['user_id']}\n";
        }
    } else {
        echo "No orders found.\n";
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}