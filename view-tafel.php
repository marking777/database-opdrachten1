<?php
include_once('Tafel.php');
include_once('../header/header.php');

$Restaurant = new Tafel();
$tafels = $Restaurant->getAllTafels();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tafels Overzicht</title>
</head>
<body>
    <h2>Tafels overzicht</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tafel ID</th>
                <th scope="col">Tafelnummer</th>
                <th scope="col">Aantal stoelen</th>
                <th scope="col">Grootte</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tafels as $table): ?>
            <tr>
                <td><?php echo $table['tafelid']; ?></td>
                <td><?php echo $table['tafelnummer']; ?></td>
                <td><?php echo $table['stoelen']; ?></td>
                <td><?php echo $table['grootte']; ?></td>
                <td><a href="update-tafel.php?id=<?php echo $table['tafelid']; ?>" class="btn btn-warning">Bewerken</a></td>
                <td><a href="delete-tafel.php?id=<?php echo $table['tafelid']; ?>" class="btn btn-danger">Verwijderen</a></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add-tafel.php" class="btn btn-primary">Tafels toevoegen</a>

</body>
</html>
