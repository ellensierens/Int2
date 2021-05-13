<?php

require_once __DIR__ . '/Controller.php';

require_once __DIR__ . '/../dao/ActivityDAO.php';
require_once __DIR__ . '/../dao/NiveauDAO.php';


class PagesController extends Controller {

  function __construct() {
    $this->activityDAO = new ActivityDAO();
    $this->niveauDAO = new NiveauDAO();
  }

  public function index() {
    $randActiviteit = $this->activityDAO->selectRandomActiviteiten(1, 2);
    $this->set("randActiviteiten", $randActiviteit);

    $hoofdActiviteit = $this->activityDAO->selectActiviteitById(1);
    $this->set("hoofdActiviteit", $hoofdActiviteit);
  }

  public function agenda() {

    $niveau = $_GET['niveau'] ?? false;
    $soort = $_GET['soort'] ?? false;
    $datum = $_GET['datum'] ?? false;

    if(empty($_GET['niveau']) && empty($_GET['soort']) && empty($_GET['datum'])){
      $activiteiten = $this->activityDAO->selectAllActiviteiten();
    }else{
      if($_GET['action'] == 'filter'){
        $activiteiten = $this->activityDAO->selectAllActiviteiten($niveau, $soort, $datum);
      }
      if(!empty($_GET['action'])){
        if($_GET['action'] == 'verwijder_filters'){
          header('Location: index.php?page=agenda');
          exit();
        }
      }
    }
    $this->set("activiteiten", $activiteiten);

    // if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
    //   echo json_encode($activiteiten);
    //   exit();
    // }

    if($_SERVER['HTTP_ACCEPT'] == 'application/json'){
      echo json_encode($activiteiten);
      exit();
    }
  }

  public function spelen() {
    $niveaus = $this->niveauDAO->select3Niveaus();
    $this->set("niveaus", $niveaus);
  }

}