<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

if (file_exists("./.env")) {
  $variables = parse_ini_file("./.env", true);
  foreach ($variables as $key => $value) {
    putenv("$key=$value");
  }
}

$routes = array(
  'home' => array(
    'controller' => 'Pages',
    'action' => 'index'
  ),
  'agenda' => array(
    'controller' => 'Pages',
    'action' => 'agenda'
  ),
  'spelen' => array(
    'controller' => 'Pages',
    'action' => 'spelen'
  ),
  'detail' => array(
    'controller' => 'Activities',
    'action' => 'detail'
  ),
  'cart' => array(
    'controller' => 'Orders',
    'action' => 'cart'
  ),
  'checkout' => array(
    'controller' => 'Orders',
    'action' => 'checkout'
  ),
  'succes' => array(
    'controller' => 'Orders',
    'action' => 'succes'
  ),
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
