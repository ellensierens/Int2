<?php

require_once( __DIR__ . '/DAO.php');

class NiveauDAO extends DAO {

    public function select3Niveaus(){
        $sql = "SELECT * FROM `int2_niveaus` WHERE `name` NOT LIKE 'iedereen'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
