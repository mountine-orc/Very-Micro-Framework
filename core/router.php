<?php
namespace Core
{
    class Router
    {
        function getRoute()
        {
            $actions = array();
            $actions["item"]=  "index";
            $actions["action"]="index";
            $actions["param"] = FALSE;
            
            $url = explode("/", $_SERVER['REQUEST_URI']);
            
            if (isset($url[1]) and trim($url[1]) != "")
                $actions["item"]=$url[1];
            
            if (isset($url[2]) and trim($url[2]) != ""){
                $actions["action"]=$url[2];
                
                if (isset($url[3])) 
                    $actions["param"]=$url[3];

                if ((string)(int)$url[2] == $url[2]){
                    $actions["action"]="get";
                    $actions["param"]=$url[2];
                }
            }
                

            
            return $actions;
        }
    }
}