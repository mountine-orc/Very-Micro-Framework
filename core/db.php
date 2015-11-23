<?php 
namespace Core
{
    class Db
    {
        private static $db = FALSE;
        
        function connect()
        {
            try {  
                if (Db::$db) 
                    return Db::$db;
                  
                $db = new \PDO('sqlite:database.sqlite');
                Db::$db = $db;
                
                return $db;
            }  
            catch(PDOException $e) {  
                echo $e->getMessage();  
            }
        }
        

    }

}