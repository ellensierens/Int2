<?php

require_once( __DIR__ . '/DAO.php');

class OrderDAO extends DAO {

    public function selectOrderById($id){
        $sql = "SELECT * FROM `int2_orders` WHERE `id` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function insertGegevens($data){

        $errors = $this->validate($data);
        if(empty($errors)){
          $sql = "INSERT INTO `int2_orders` (`naam`,`voornaam`,`email`) VALUES(:naam,:voornaam,:email)";
          $stmt = $this->pdo->prepare($sql);
          $stmt->bindValue(':naam',$data['naam']);
          $stmt->bindValue(':voornaam',$data['voornaam']);
          $stmt->bindValue(':email',$data['email']);
          if($stmt->execute()){
            return $this->selectOrderById($this->pdo->lastInsertId());
          }
        }
        return false;
      }
    

      public function validate($data){
        $errors = [];
        if (empty($data['naam'])) {
          $errors['naam'] = 'Gelieve je naam op te geven.';
        }
        if (empty($data['voornaam'])) {
          $errors['voornaam'] = 'Gelieve je voonaam op te geven.';
        }
        if (empty($data['email'])) {
            $errors['email'] = 'Gelieve je email op te geven.';
          }
        return $errors;
    }
}
