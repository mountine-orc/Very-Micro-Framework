<?php
namespace Model
{
    use Core\Db;
            
    class Comment
    {
        function __construct()
        {
            $dataBase = new Db;
            $this->db = $dataBase->connect();
        }
        
        function getCommentListByArticleId($articleId)
        {
            $stmt = $this->db->prepare('SELECT * FROM comment WHERE article_id = ? ORDER BY id DESC');
            $stmt->execute(array($articleId));
            $result = $stmt->fetchAll();
            
            return $result;
        }
        
        //AJAX method
        function addNew($articleId, $text, $email, $name, $captcha)
        {
            session_start();
            
            // code for check server side validation
            if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $captcha) != 0){  
                echo "CAPTCHAFALSE";
                die();	
            }

            $stmt = $this->db->prepare('INSERT INTO comment(article_id, text, email, user_name) values(?, ?, ?, ?)');
            if ($stmt->execute(array($articleId, $text, $email, $name)))
                echo "TRUE";
            else
                echo "FALSE";
                
            die();
        }
        
    }
}