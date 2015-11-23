<?php
namespace Model
{
    use Core\Db;
            
    class Article
    {
        function __construct()
        {
            $dataBase = new Db;
            $this->db = $dataBase->connect();
        }
        
        function printAllArticles()
        {
            $result = $this->db->query('SELECT * FROM article');
           
            return $result;
        }
        
        function getArticle($id)
        {
            $stmt = $this->db->prepare('SELECT * FROM article WHERE id = ?');
            $stmt->execute(array($id));
            $result = $stmt->fetchAll();
    
            return $result;

        }
    }
}