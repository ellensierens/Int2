<?php

require_once __DIR__ . '/Controller.php';

require_once __DIR__ . '/../dao/ActivityDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';
require_once __DIR__ . '/../dao/OrderActiviteitDAO.php';


class OrdersController extends Controller {

  function __construct() {
    $this->activityDAO = new ActivityDAO();
    $this->orderDAO = new OrderDAO();
    $this->orderActiviteitDAO = new OrderActiviteitDAO();
  }

  public function cart() {
    if(!empty($_POST['action'])){
      if($_POST['action'] == "add"){
        if(empty($_SESSION['cart'][$_POST['activiteit_id']])){
          $activiteit = $this->activityDAO->selectActiviteitById($_POST['activiteit_id']);
          if(empty($activiteit)){
            return;
          }
          $_SESSION['cart'][$_POST['activiteit_id']] = array(
            'activiteit' => $activiteit,
            'hoeveelheid' => 0
          );
        }
        $_SESSION['cart'][$_POST['activiteit_id']]['hoeveelheid']++;
        header('Location: index.php?page=cart');
        exit();
      }
      if($_POST['action'] == 'update'){
        foreach ($_POST['aantal'] as $activiteitId => $hoeveelheid) {
          if (!empty($_SESSION['cart'][$activiteitId])) {
            $_SESSION['cart'][$activiteitId]['hoeveelheid'] = $hoeveelheid;
          }
        }
        foreach($_SESSION['cart'] as $activiteitId => $info) {
          if ($info['hoeveelheid'] <= 0) {
            unset($_SESSION['cart'][$activiteitId]);
          }
        }
        header('Location: index.php?page=cart');
        exit();
      }
      if($_POST['action'] == 'gegevens'){
        if(!empty($_POST['activiteit_id']) && !empty($_POST['aantal']))
        {$_SESSION['cart'][$_POST['activiteit_id']]['hoeveelheid'] = $_POST['aantal'][$_POST['activiteit_id']];}
        if(!empty($_SESSION['cart'])){
          header('Location: index.php?page=checkout');
          exit();
        }else{
          $_SESSION['error'] = 'je hebt geen activiteiten toegevoegd';
        }
      }
    }
    if(!empty($_POST['verwijder'])){
      if (isset($_SESSION['cart'][$_POST['verwijder']])) {
        unset($_SESSION['cart'][$_POST['verwijder']]);
      }
      header('Location: index.php?page=cart');
      exit();
    }
  }

  public function checkout() {
    
    if(!empty($_POST['action'])){
      if($_POST['action'] == 'addOrder'){
        $insertedGegevens = $this->orderDAO->insertGegevens($_POST);

        if(!$insertedGegevens){
          $errors = $this->orderDAO->validate($_POST);
          $this->set('errors',$errors);
        }
        if(!empty($_SESSION['cart']))
        foreach($_SESSION['cart'] as $activiteit){
          $data = array(
            'activiteit_id' => $activiteit['activiteit']['id'],
            'order_id' => $insertedGegevens['id'],
            'hoeveelheid' => $activiteit['hoeveelheid']
          );
          $insertedOrder = $this->orderActiviteitDAO->insertOrder($data);
        }
      }
      $_SESSION['cart'] = array();

      header('Location: index.php?page=succes');
      exit();

    }

  }

  public function succes() {
    
  }


}