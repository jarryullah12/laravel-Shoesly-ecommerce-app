<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=laravel', 'root', '');
    $stmt = $pdo->query('SELECT COUNT(*) FROM products');
    $count = $stmt->fetchColumn();
    echo 'Number of products: ' . $count;
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}