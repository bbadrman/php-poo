<?php

// $model = new \Model\Comment();

// $commentaires = $model->findAll(); //connexions a mysql :1
// $commentaire = $model->find(1);  //connexions a mysql : 1
// $model->delete(1); //connexions a mysql :1

class Database{

  /**
   * 1. Connexion à la base de données avec PDO
   * Attention, on précise ici deux options :
   * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
   * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
   */ 

   private static $instance = null;
  
  /** 
   * retourne une connextion au base donnée
   * 
   * @return PDO
  */
  public static function getPdo(): PDO
  {
    if (self::$instance === null) {
        self::$instance = new PDO('mysql:host=db;dbname=chamla_poo_db', 'root', 'root', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
    }
    return self::$instance;
  
    }

}




