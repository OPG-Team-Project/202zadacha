<?php
session_start();
include('db.php');
?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Алкохолни Напитки</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Алкохолни Напитки</h1>
        <nav class="nav justify-content-center">
            <a class="nav-link" href="?category=Бира">Бира</a>
            <a class="nav-link" href="?category=Вино">Вино</a>
            <a class="nav-link" href="?category=Спиртни напитки">Спиртни напитки</a>
        </nav>
        <hr>

        <?php
        $category = isset($_GET['category']) ? $_GET['category'] : 'Бира'; 

        if ($category == 'Спиртни напитки') {
            $stmt = $conn->prepare("SELECT * FROM products WHERE category LIKE ?");
            $stmt->execute(['Спиртни напитки%']);
        } else {

            $stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
            $stmt->execute([$category]);
        }

        $products = $stmt->fetchAll();

        foreach ($products as $product) {
            echo "<div class='card mb-4'>";
            echo "<img src='images/" . $product['image'] . "' class='card-img-top' alt='" . $product['name'] . "'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $product['name'] . "</h5>";
            echo "<p class='card-text'>Цена: " . $product['price'] . " лв.</p>";
            echo "<a href='add_to_cart.php?id=" . $product['id'] . "' class='btn btn-success'>Добави в количката</a>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
