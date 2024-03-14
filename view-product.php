<?php
include_once('product.php');
include_once('../header/header.php');

$product = new Product();
$producten = $product->getAllProducten();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten Overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Producten Overzicht</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Prijs</th>
                    <th scope="col">Beschrijving</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($producten as $product): ?>
                    <tr>
                        <td><?php echo $product['productid']; ?></td>
                        <td><?php echo $product['naam']; ?></td>
                        <td><?php echo $product['prijs']; ?></td>
                        <td><?php echo $product['beschrijving']; ?></td>
                        <td><a href="update-product.php?id=<?php echo $product['productid']; ?>" class="btn btn-warning">Bewerken</a></td>
                        <td><a href="delete-product.php?id=<?php echo $product['productid']; ?>" class="btn btn-danger">Verwijderen</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><br>
    <a href="add-product.php" class="btn btn-primary">Producten toevoegen</a>
</body>
</html>
