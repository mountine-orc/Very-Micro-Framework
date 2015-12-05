<?php
require_once("init.php");

use Core\Router;

$router = new Router;
$urlData = $router->getRoute(); //['item', 'action', 'param']

$controllerName = 'Controller\\'.$urlData["item"].'Controller';
$methodName = $urlData["action"]."Action";
$controller = new $controllerName();
$controller->$methodName($urlData["param"]);

