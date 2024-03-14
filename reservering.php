<?php
include_once('../db/db.php');

class Reservering {
    private $dbh;
    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function addReservering($begindatum, $einddatum, $klantid, $tafelid) {
        $sql = "INSERT INTO reservering (begindatum, einddatum, klantid, tafelid) VALUES (?, ?, ?, ?)";
        $this->dbh->run($sql, array($begindatum, $einddatum, $klantid, $tafelid));
    }

    public function getAllReserveringen() {
        $sql = "SELECT * FROM reservering";
        return $this->dbh->run($sql);
    }
    public function updateReservering($reserveringid, $begindatum, $einddatum, $klantid, $tafelid) {
        $sql = "UPDATE reservering SET begindatum = ?, einddatum = ?, klantid = ?, tafelid = ? WHERE reserveringid = ?";
        $this->dbh->run($sql, array($begindatum, $einddatum, $klantid, $tafelid, $reserveringid));
    }

    public function deleteReservering($reserveringid) {
        $sql = "DELETE FROM reservering WHERE reserveringid = ?";
        $this->dbh->run($sql, array($reserveringid));
    }

    public function getReserveringById($reserveringid) {
        $sql = "SELECT * FROM reservering WHERE reserveringid = ?";
        $stmt = $this->dbh->run($sql, array($reserveringid));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
