<?php
include_once('rekening.php');
include_once('../header/header.php');

$Rekening = new Rekening();
$rekeningen = $Rekening->getAllRekeningen();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekeningen Overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Rekeningen Overzicht</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Rekening ID</th>
                    <th scope="col">Reservering ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Omschrijving</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rekeningen as $rekening): ?>
                    <tr>
                        <td><?php echo $rekening['rekeningid']; ?></td>
                        <td><?php echo $rekening['reserveringid']; ?></td>
                        <td><?php echo $rekening['productid']; ?></td>
                        <td><?php echo $rekening['omschrijving']; ?></td>
                        <td><a href="update-rekening.php?id=<?php echo $rekening['rekeningid']; ?>" class="btn btn-warning">Bewerken</a></td>
                        <td><a href="delete-rekening.php?id=<?php echo $rekening['rekeningid']; ?>" class="btn btn-danger">Verwijderen</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
    <a href="add-rekening.php" class="btn btn-primary">Rekening toevoegen</a>
</body>
</html>
