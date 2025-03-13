<?php
session_start();
include('db.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    if ($product) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }
    }
}

header('Location: cart.php'); 
exit();
