<?php


class Database{

  /**
   * 1. Connexion à la base de données avec PDO
   * Attention, on précise ici deux options :
   * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
   * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
   */ 
  
  /** 
   * retourne une connextion au base donnée
   * 
   * @return PDO
  */
  public static function getPdo(): PDO
  {
      $pdo = new PDO('mysql:host=db;dbname=chamla_poo_db', 'root' , 'root', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
  
    return $pdo;
  }

}




