<?php
include_once('klant.php');
include_once('../header/header.php');

$Klant = new Klant();
$klanten = $Klant->getAllKlanten();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klanten Overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Klanten Overzicht</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Klant ID</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefoon</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($klanten as $klant): ?>
                    <tr>
                        <td><?php echo $klant['klantid']; ?></td>
                        <td><?php echo $klant['naam']; ?></td>
                        <td><?php echo $klant['email']; ?></td>
                        <td><?php echo $klant['telefoon']; ?></td>
                        <td><a href="update-klant.php?id=<?php echo $klant['klantid']; ?>" class="btn btn-warning">Bewerken</a></td>
                        <td><a href="delete-klant.php?id=<?php echo $klant['klantid']; ?>" class="btn btn-danger">Verwijderen</a></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><br>
    <a href="add-klant.php" class="btn btn-primary">klanten toevoegen</a>
</body>
</html>
