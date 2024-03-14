<?php
include_once('reservering.php');
include_once('../klant/klant.php');
include_once('../tafel/tafel.php');
include_once('../header/header.php');

$Reservering = new Reservering();
$Klant = new Klant();
$Tafel = new Tafel();

$klanten = $Klant->getAllKlanten();
$tafels = $Tafel->getAllTafels();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $reserveringid = $_POST["reserveringid"];
        $begindatum = $_POST["begindatum"];
        $einddatum = $_POST["einddatum"];
        $klantid = $_POST["klantid"];
        $tafelid = $_POST["tafelid"];

        $Reservering->updateReservering($reserveringid, $begindatum, $einddatum, $klantid, $tafelid);
        header("Location: view-reserveringen.php");
        exit;
        } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET["id"])) {
    $reserveringid = $_GET["id"];
    $reservering = $Reservering->getReserveringById($reserveringid);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Reservering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Reservering bijwerken</h2>
        <form method="POST"> 
            <input type="hidden" name="reserveringid" value="<?php echo $reserveringid; ?>">
            <div class="mb-3">
                <label class="form-label">Begindatum:</label>
                <input type="date" class="form-control" name="begindatum" value="<?php echo $reservering['begindatum']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Einddatum:</label>
                <input type="date" class="form-control" name="einddatum" value="<?php echo $reservering['einddatum']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kies een klant:</label>
                <select class="form-select" name="klantid">
                    <?php foreach ($klanten as $klant): ?>
                        <option value="<?php echo $klant['klantid']; ?>" <?php if ($klant['klantid'] === $reservering['klantid']) echo "selected"; ?>><?php echo $klant['naam']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Kies een tafel:</label>
                <select class="form-select" name="tafelid">
                    <?php foreach ($tafels as $tafel): ?>
                        <option value="<?php echo $tafel['tafelid']; ?>" <?php if ($tafel['tafelid'] === $reservering['tafelid']) echo "selected"; ?>><?php echo $tafel['tafelnummer']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
</html>
