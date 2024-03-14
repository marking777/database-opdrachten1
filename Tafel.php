<?php
include_once('../db/db.php');

class Tafel {
    private $dbh;

    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function addTafel($tafelnummer, $stoelen, $grootte) {
        $sql = "INSERT INTO restaurant (tafelnummer, stoelen, grootte) VALUES (?, ?, ?)";
        $this->dbh->run($sql, array($tafelnummer, $stoelen, $grootte));
    }

    public function getAllTafels() {
        $sql = "SELECT * FROM restaurant";
        $stmt = $this->dbh->run($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateTafels($tafelid, $tafelnummer, $stoelen, $grootte) {
        $sql = "UPDATE restaurant SET tafelnummer = ?, stoelen = ?, grootte = ? WHERE tafelid = ?";
        $this->dbh->run($sql, array($tafelnummer, $stoelen, $grootte, $tafelid));
    }
    
    public function deleteTafel($tafelid) {
        $sql = "DELETE FROM restaurant WHERE tafelid = ?";
        $this->dbh->run($sql, array($tafelid));
    }

    public function getTafelById($tafelid) {
        $sql = "SELECT * FROM restaurant WHERE tafelid = ?";
        $stmt = $this->dbh->run($sql, array($tafelid));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}

?>
