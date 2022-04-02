<?php

namespace Models;

require_once('liberaries/database.php');

class Model {
    
    protected $pdo;    // reserve a moi et mes enfant
    protected $table; //

    public function __construct()
    {
        $this->pdo = getPdo();
    }

    /**
     * retourne la liste des articles classés par date de creation
     *
     * @return array
     */

    public function findAll(?string $order = ""):Array
    {
        $sql = "SELECT * FROM {$this->table}";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }

        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();

        return $articles;
    }

    public function find(int $id)
    {

        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");

        // On exécute la requête en précisant le paramètre :article_id 
        $query->execute(['id' => $id]);

        // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();

        return $item;
    }

    /**
     * suprimer un commentaire grace a son identifiant 
     * 
     * @param integer $id
     * @return  void
     */
    public function delete(int $id): void
    {

        $query = $this->pdo->prepare("DELETE FROM {$this->table}  WHERE id = :id");
        $query->execute(['id' => $id]);
    }

}