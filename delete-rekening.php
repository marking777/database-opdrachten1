<?php
include_once('rekening.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $rekeningid = $_GET["id"];
    $Rekening = new Rekening();
    $Rekening->deleteRekening($rekeningid);
}

header("Location:view-rekening.php");
exit();
?>
