<?php
require_once("init.php");

use Core\Router;
use Core\View;

use Model\Article;
use Model\Comment;

$view = new View;
$router = new Router;
$urlData = $router->getRoute();

//$urlData["item"]  $urlData["action"]
$controllerName = 'Controller\\'.$urlData["item"];
$methodName = "{$urlData["action"]}Action";
$controller = new $controllerName();
$controller->$methodName($urlData["param"]);

//call_user_func( array($controller, $methodName)) ;
