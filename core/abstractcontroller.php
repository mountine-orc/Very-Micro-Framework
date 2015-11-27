<?php
namespace Core;

use Core\View;

abstract class AbstractController{
    function __construct(){
        $this->view = new View;
    }

    function __call($name, $arguments) {
        $this->pageNotFoundAction();
    }
    
    abstract function indexAction();
    
    function pageNotFoundAction(){
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        $this->view->render("pageNotFound");
    }
}