<?php
include_once('reservering.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $reserveringid = $_GET["id"];
    $Reservering = new Reservering();
    $Reservering->deleteReservering($reserveringid);
}

header("Location:view-reserveringen.php");
exit();
?>
