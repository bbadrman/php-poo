<?php

namespace Controllers;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('liberaries/utils.php');
require_once('liberaries/controllers/Controller.php');
require_once('liberaries/models/Article.php');
require_once('liberaries/models/Comment.php');
    
class Article  extends Controller
{
 
   protected $modelName = \Models\Article::class;

    public function index()
    {

    $articles = $this->model->findAll("created_at DESC");  

    $pageTitle = "Accueil";

    render('articles/index', compact('pageTitle', 'articles')); 

    }

    public function show(){
      

        $commentModel = new \Models\Comment();

        /**
         * 1. Récupération du param "id" et vérification de celui-ci
         */
        // On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

        // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        // On peut désormais décider : erreur ou pas ?!
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

      
        $article = $this->model->find($article_id);


        $commentaires = $commentModel->findAllWithArticle($article_id);

        $pageTitle = $article['title'];

        render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id')); // fonction compact qui cree une table asociative qui remplace la fanction au decis


    }
    public function delete(){



        /**
         * 1. On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

       

        $article = $this->model->find($id);
        if (!$article) {  //$query->rowCount() === 0 par !$article
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        $this->model->delete($id);

      
        header("Location: index.php");
        exit();

        redirect("index.php");

    }
}