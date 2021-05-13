<?php

require_once( __DIR__ . '/DAO.php');

class OrderActiviteitDAO extends DAO {

 public function selectOrderById($id){
        $sql = "SELECT * FROM `int2_orders_activiteiten` WHERE `id` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


  public function insertOrder($data){
    if(empty($errors)){
      $sql = "INSERT INTO `int2_orders_activiteiten` (`activiteit_id`,`order_id`,`hoeveelheid`) VALUES(:activiteit_id,:order_id,:hoeveelheid)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':activiteit_id',$data['activiteit_id']);
      $stmt->bindValue(':order_id',$data['order_id']);
      $stmt->bindValue(':hoeveelheid',$data['hoeveelheid']);
      if($stmt->execute()){
        return $this->selectOrderById($this->pdo->lastInsertId());
      }
    }
  }
   
}
