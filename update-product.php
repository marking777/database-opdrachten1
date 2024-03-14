<?php
include_once('product.php');
include_once('../header/header.php');

$product = new Product();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $productid = $_POST['productid'];
        $naam = $_POST['naam'];
        $prijs = $_POST['prijs'];
        $beschrijving = $_POST['beschrijving'];

        $product->updateProduct($productid, $naam, $prijs, $beschrijving);
        header("Location: view-product.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET["id"])) {
    $productid = $_GET["id"];
    $productInfo = $product->getproductById($productid);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Product bijwerken</h2>
        <form method="POST"> 
            <input type="hidden" name="productid" value="<?php echo $productInfo['productid']; ?>">
            <div class="mb-3">
                <label class="form-label">Naam:</label>
                <input type="text" class="form-control" name="naam" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Prijs:</label>
                <input type="number" class="form-control" name="prijs" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Beschrijving:</label>
                <input type="text" class="form-control" name="beschrijving" required>
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
</html>
