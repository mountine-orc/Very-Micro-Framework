<?php
namespace Controller

use Core\AbstractController;
use Model\Comment;

class CommentController extends AbstractController
{
    function __construct()
    {
        $this->comment = new Comment;
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
