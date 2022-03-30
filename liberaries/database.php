<?php
/** 
 * retourne une connextion au base donnée
 * 
 * @return PDO
*/
function getPdo(): PDO
{
    $pdo = new PDO('mysql:host=db;dbname=chamla_poo_db', 'root' , 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

  return $pdo;
}