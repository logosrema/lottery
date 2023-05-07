<?php
include "Classconnect.php";
class TableClass extends Classconnect{

    public function getUserBets () : array {
        $sql = "SELECT * FROM bet ORDER BY beid DESC";
        $stmt = $this->dbconnect()->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}

