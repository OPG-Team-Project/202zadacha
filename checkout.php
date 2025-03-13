<?php session_start(); ?>
<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завършване на поръчката</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Завършване на поръчката</h1>

        <?php
        if (empty($_SESSION['cart'])) {
            echo "<p>Нямате продукти в количката.</p>";
        } else {
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            echo "<h3>Общо: " . $total . " лв.</h3>";
            echo "<form action='complete_order.php' method='POST'>";
            echo "<div class='mb-3'>";
            echo "<label for='name' class='form-label'>Име</label>";
            echo "<input type='text' class='form-control' id='name' name='name' required>";
            echo "</div>";
            echo "<div class='mb-3'>";
            echo "<label for='address' class='form-label'>Адрес за доставка</label>";
            echo "<input type='text' class='form-control' id='address' name='address' required>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary'>Завърши поръчката</button>";
            echo "</form>";
        }
        ?>
    </div>
</body>
</html>

