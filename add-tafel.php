<?php
include_once('Tafel.php');
include_once('../header/header.php');

$Restaurant = new Tafel();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $tafelnummer = $_POST["tafelnummer"];
        $stoelen = $_POST["stoelen"];
        $grootte = $_POST["grootte"];

        $Restaurant->addTafel($tafelnummer, $stoelen, $grootte);
        echo "<p>Tafel toegevoegd!</p>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Voeg een nieuwe tafel toe</title>
</head>
<body>
<div class="container">
    <h2>Voeg een nieuwe tafel toe</h2>
    <form method="POST"> 
        <div class="mb-3">
            <label class="form-label">Tafelnummer:</label>
            <input type="text" class="form-control" name="tafelnummer" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Aantal stoelen:</label>
            <input type="text" class="form-control" name="stoelen" required>
        </div>
        <div class="mb-3">
            <label class="form-label">grootte:</label>
            <input type="text" class="form-control" name="grootte" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
     
    </form><br>
    <a href="view-tafel.php" class="btn btn-primary">Bekijk Tafels</a>
    </div>
</body>
</html>
