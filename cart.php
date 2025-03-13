<?php session_start(); ?>
<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Количка</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Твоята Количка</h1>
        
        <?php
        if (empty($_SESSION['cart'])) {
            echo "<p>Количката е празна.</p>";
        } else {
            $total = 0;
            echo "<table class='table'>";
            echo "<thead><tr><th>Продукт</th><th>Цена</th><th>Количество</th><th>Общо</th><th>Действия</th></tr></thead><tbody>";

            foreach ($_SESSION['cart'] as $id => $item) {
                $total += $item['price'] * $item['quantity'];
                echo "<tr>";
                echo "<td>" . htmlspecialchars($item['name']) . "</td>";
                echo "<td>" . htmlspecialchars($item['price']) . " лв.</td>";
                echo "<td>" . htmlspecialchars($item['quantity']) . "</td>";
                echo "<td>" . ($item['price'] * $item['quantity']) . " лв.</td>";
                echo "<td><a href='remove_from_cart.php?id=" . $id . "' class='btn btn-danger'>Премахни</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
            echo "<h3>Общо: " . $total . " лв.</h3>";
            echo "<a href='checkout.php' class='btn btn-primary'>Завърши поръчката</a>";
        }
        ?>
    </div>
</body>
</html>
