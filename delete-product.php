<?php
include_once('product.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $productid = $_GET["id"];
    $product = new product();
    $product->deleteProduct($productid);
}

header("Location:view-product.php");
exit();
?>
