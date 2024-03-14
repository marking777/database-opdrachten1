<?php
include_once('../db/db.php');
class Klant {
    private $dbh;


    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function addKlant($naam, $email, $telefoon) {
        $sql = "INSERT INTO klanten (naam, email, telefoon) VALUES (?, ?, ?)";
        $this->dbh->run($sql, array($naam, $email, $telefoon));
    }

    public function getAllklanten() {
        $sql = "SELECT * FROM klanten";
        $stmt = $this->dbh->run($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateKlant($klantid, $naam, $email, $telefoon) {
        $sql = "UPDATE klanten SET naam = ?, email = ?, telefoon = ? WHERE klantid = ?";
        $this->dbh->run($sql, array($naam, $email, $telefoon, $klantid));
    }
    
    public function deleteKlanten($klantid) {
        $sql = "DELETE FROM klanten WHERE klantid = ?";
        $this->dbh->run($sql, array($klantid));
    }

    public function getKlantById($klantid) {
        $sql = "SELECT * FROM klanten WHERE klantid = ?";
        $stmt = $this->dbh->run($sql, array($klantid));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
}
?>
