<?php
namespace Controller;

class Comment extends \Core\AbstractController
{
    function __construct()
    {
        $this->comment = new \Model\Comment;
        parent::__construct();
    }
    
    function indexAction(){
    }
    
    function addAction()
    {
        //TODO: check $_POST data and print errors if exist
        $comments = $this->comment->addNew($_POST["articleId"], $_POST["message"], $_POST["email"], $_POST["name"], $_POST["captcha"]);
    }
}
