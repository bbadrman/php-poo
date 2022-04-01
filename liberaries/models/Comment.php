<?php
require_once('liberaries/models/Model.php');

class Comment extends Model {
    
    /**
     * return la liste des commentaires d'un article donnée
     * 
     * @param integer $article_id
     * @return  array
     */

    public function findAllWithArticle(int $article_id): array
    {

        // $pdo = getPdo();
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }


    public function find(int $id)
    {

        $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
        $comment = $query->fetch();
        return $comment;
    }

    /**
     * suprimer un commentaire grace a son identifiant 
     * 
     * @param integer $id
     * @return  void
     */     
    public function delete(int $id): void
    {
       
        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
    }
    /**
     * insere un commentaire dans la liste de la base
     * 
     * @param string $author
     * @param string $content
     * @param integer $article_id
     * @return  void
     */
    public function insert(string $author, string $content, int $article_id): void
    {
      
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}