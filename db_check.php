<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=laravel', 'root', '');
    echo 'Connected to database successfully';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
 
