<?php
include_once('Tafel.php');
include_once('../header/header.php');

$Restaurant = new Tafel();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $tafelid = $_POST["tafelid"];
        $tafelnummer = $_POST["tafelnummer"];
        $stoelen = $_POST["stoelen"];
        $grootte = $_POST["grootte"];

        $Restaurant->updateTafels($tafelid, $tafelnummer, $stoelen, $grootte);
        header("Location: view-tafel.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET["id"])) {
    $tafelid = $_GET["id"];
    $tafel = $Restaurant->getTafelById($tafelid); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bewerk tafel</title>
</head>
<body>
    <div class="container">
        <h2>Bewerk tafel</h2>
        <form method="POST"> 
            <input type="hidden" name="tafelid" value="<?php echo $tafelid; ?>">
            <div class="mb-3">
                <label class="form-label">Tafelnummer:</label>
                <input type="text" class="form-control" name="tafelnummer" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Aantal stoelen:</label>
                <input type="text" class="form-control" name="stoelen" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Grootte:</label>
                <input type="text" class="form-control" name="grootte" required>
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
</html>
