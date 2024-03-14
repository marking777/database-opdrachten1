<?php
include_once('rekening.php');
include_once('../reservering/reservering.php');
include_once('../product/product.php');
include_once('../header/header.php');

$Rekening = new Rekening();

$Reservering = new Reservering();
$reserveringen = $Reservering->getAllReserveringen();

$Product = new Product();
$producten = $Product->getAllProducten();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $reserveringid = $_POST["reserveringid"];
        $productid = $_POST["productid"];
        $omschrijving = $_POST["omschrijving"];

        $Rekening->addRekening($reserveringid, $productid, $omschrijving);
        echo "<p>Rekening toegevoegd!</p>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg een nieuwe rekening toe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Voeg een nieuwe rekening toe</h2>
        <form method="POST"> 
            <div class="mb-3">
                <label class="form-label">Kies een reservering:</label>
                <select class="form-select" name="reserveringid">
                    <?php foreach ($reserveringen as $reservering): ?>
                        <option value="<?php echo $reservering['reserveringid']; ?>"><?php echo $reservering['reserveringid']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Kies een product:</label>
                <select class="form-select" name="productid">
                    <?php foreach ($producten as $product): ?>
                        <option value="<?php echo $product['productid']; ?>"><?php echo $product['naam']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Omschrijving:</label>
                <input type="text" class="form-control" name="omschrijving">
            </div>
            <button type="submit" class="btn btn-primary">Voeg toe</button>
        </form><br>
    <a href="view-rekening.php" class="btn btn-primary">Bekijk rekeningen</a>
    </div>
</body>
</html>
