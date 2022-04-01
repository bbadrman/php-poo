<?php
require_once('liberaries/models/Model.php');

 class Article extends Model   // extents saveut dire que hirite tous le code sur Model
 {
   

    /**
     * retourne la liste des articles classés par date de creation
     *
     * @return array
     */

     public function findAll()
     {
        //  $pdo = getPdo();

         $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
         // On fouille le résultat pour en extraire les données réelles
         $articles = $resultats->fetchAll();

         return $articles;
     }


    public function find(int $id)
    {
   
        $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");

        // On exécute la requête en précisant le paramètre :article_id 
        $query->execute(['article_id' => $id]);

        // On fouille le résultat pour en extraire les données réelles de l'article
        $article = $query->fetch();

        return $article;
    }

    /**
     * suprimer un article dans la base grace à son identifiant
     * 
     * @param integer $id
     * @return  void
     */
    public function delete(int $id): void
    {
        
        $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);
    }
 }