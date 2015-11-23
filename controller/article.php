<?php
namespace Controller;

class Article{
    function __construct(){
        $this->article = new \Model\Article;
        $this->view = new \Core\View;
    }
    
    function indexAction(){
        $article = new Article;
        $list = $this->article->printAllArticles();
        
        $this->view->render("articleList", array("list"=>$list));
    }
    
    function getAction($id){
        $comment = new \Model\Comment;
        $result   = $this->article->getArticle($id);
        $comments = $comment->getCommentListByArticleId($id);
        
        $this->view->render("article", array("result"=>$result, "comments"=>$comments));
    }
}