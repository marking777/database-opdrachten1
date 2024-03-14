<?php
include_once('klant.php');
include_once('../header/header.php');

$Klant = new Klant();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $klantid = $_POST["klantid"];
        $naam = $_POST["naam"];
        $email = $_POST["email"];
        $telefoon = $_POST["telefoon"];

        $Klant->updateKlant($klantid, $naam, $email, $telefoon);
        header("Location: view-klant.php");
        exit;
        } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET["id"])) {
    $klantid = $_GET["id"];
    $klant = $Klant->getKlantById($klantid); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bewerk klant</title>
</head>
<body>
    <div class="container">
        <h2>Bewerk klant</h2>
        <form method="POST"> 
            <input type="hidden" name="klantid" value="<?php echo $klantid; ?>">
            <div class="mb-3">
                <label class="form-label">Naam:</label>
                <input type="text" class="form-control" name="naam"  required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="text" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefoon:</label>
                <input type="text" class="form-control" name="telefoon"  required>
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
</html>
