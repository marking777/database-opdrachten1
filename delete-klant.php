<?php
include_once('klant.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $klantid = $_GET["id"];
    $Klant = new Klant();
    $Klant->deleteKlanten($klantid);
}

header("Location:view-klant.php");
exit();
?>
