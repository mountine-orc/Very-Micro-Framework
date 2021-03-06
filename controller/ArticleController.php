<?php
namespace Controller;

use Core\AbstractController;
use Model\Article;

class ArticleController extends AbstractController
{
    function __construct()
    {
        $this->article = new Article;
        parent::__construct();
    }
    
    function indexAction()
    {
        $list = $this->article->getArticleList();
        
        $this->view->render("articleList", array("list"=>$list));
    }
    
    function getAction($id)
    {
        $comment = new \Model\Comment;
        $result   = $this->article->getArticle($id);
        
        if (empty($result))
            $this->pageNotFoundAction();
        else{
            $comments = $comment->getCommentListByArticleId($id);
            $this->view->render("article", array("result"=>$result, "comments"=>$comments));
        }
    }
}