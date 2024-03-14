<?php
include_once('reservering.php');
include_once('../header/header.php');

$Reservering = new Reservering();
$reserveringen = $Reservering->getAllReserveringen();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservering Overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Reservering Overzicht</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Reservering ID</th>
                    <th scope="col">Begindatum</th>
                    <th scope="col">Einddatum</th>
                    <th scope="col">Klant ID</th>
                    <th scope="col">Tafel ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reserveringen as $reservering): ?>
                    <tr>
                        <td><?php echo $reservering['reserveringid']; ?></td>
                        <td><?php echo $reservering['begindatum']; ?></td>
                        <td><?php echo $reservering['einddatum']; ?></td>
                        <td><?php echo $reservering['klantid']; ?></td>
                        <td><?php echo $reservering['tafelid']; ?></td>
                        <td><a href="update-reservering.php?id=<?php echo $reservering['reserveringid']; ?>" class="btn btn-warning">Bewerken</a></td>
                        <td><a href="delete-reservering.php?id=<?php echo $reservering['reserveringid']; ?>" class="btn btn-danger">Verwijderen</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><br>
    <a href="add-reservering.php" class="btn btn-primary">reservering toevoegen</a>

</body>
</html>
