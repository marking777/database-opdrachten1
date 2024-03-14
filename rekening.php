<?php
include_once('../db/db.php');

class Rekening {
    private $dbh;

    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function addRekening($reserveringid, $productid, $omschrijving) {
        $sql = "INSERT INTO rekeningen (reserveringid, productid, omschrijving) VALUES (?, ?, ?)";
        $this->dbh->run($sql, array($reserveringid, $productid, $omschrijving));
    }

    public function getAllRekeningen() {
        $sql = "SELECT * FROM rekeningen";
        return $this->dbh->run($sql);
    }
    public function updateRekening($rekeningid, $reserveringid, $productid, $omschrijving) {
        $sql = "UPDATE rekeningen SET reserveringid = ?, productid = ?, omschrijving = ? WHERE rekeningid = ?";
        $this->dbh->run($sql, array($reserveringid, $productid, $omschrijving, $rekeningid));
    }

    public function deleteRekening($rekeningid) {
        $sql = "DELETE FROM rekeningen WHERE rekeningid = ?";
        $this->dbh->run($sql, array($rekeningid));
    }

    public function getRekeningById($rekeningid) {
        $sql = "SELECT * FROM rekeningen WHERE rekeningid = ?";
        $stmt = $this->dbh->run($sql, array($rekeningid));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


?>
