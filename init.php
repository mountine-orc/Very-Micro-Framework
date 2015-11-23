<?php 

function __autoload($class_name) {
    $pathArray = explode("\\", $class_name);
    $filePath = "/".implode("/", $pathArray).'.php';
    include $filePath;
}
