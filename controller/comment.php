<?php
namespace Controller;

class Comment{
    function addAction(){
        $comment = new \Model\Comment;
        $comments = $comment->addNew($_POST["articleId"], $_POST["message"], $_POST["email"], $_POST["name"], $_POST["captcha"]);
    }
}
