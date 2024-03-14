<?php
include_once('Tafel.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $tafelid = $_GET["id"];
    $Restaurant = new Tafel();
    $Restaurant->deleteTafel($tafelid);
}

header("Location:view-tafel.php");
exit();
?>
