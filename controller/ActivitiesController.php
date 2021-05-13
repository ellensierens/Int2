<?php

require_once __DIR__ . '/Controller.php';

require_once __DIR__ . '/../dao/ActivityDAO.php';


class ActivitiesController extends Controller {

  function __construct() {
    $this->activityDAO = new ActivityDAO();
  }


  public function detail() {
    $activiteit = $this->activityDAO->selectActiviteitById($_GET['id']);
    $this->set("activiteit", $activiteit);

    $randActiviteit = $this->activityDAO->selectRandomActiviteiten($_GET['id'], 3);
    $this->set("randActiviteiten", $randActiviteit);

  }
}