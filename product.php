<?php
include_once('../db/db.php');
class product {
    private $dbh;


    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function addproduct($naam, $prijs, $beschrijving) {
        $sql = "INSERT INTO producten (naam, prijs, beschrijving) VALUES (?, ?, ?)";
        $this->dbh->run($sql, array($naam, $prijs, $beschrijving));
    }
    public function getAllProducten() {
        $sql = "SELECT * FROM producten";
        $stmt = $this->dbh->run($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateProduct($productid, $naam, $prijs, $beschrijving) {
        $sql = "UPDATE producten SET naam = ?, prijs = ?, beschrijving = ? WHERE productid = ?";
        $this->dbh->run($sql, array($naam, $prijs, $beschrijving, $productid));
    }
    
    public function deleteProduct($productid) {
        $sql = "DELETE FROM producten WHERE productid = ?";
        $this->dbh->run($sql, array($productid));
    }

    public function getproductById($productid) {
        $sql = "SELECT * FROM producten WHERE productid = ?";
        $stmt = $this->dbh->run($sql, array($productid));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
