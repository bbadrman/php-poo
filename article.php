<?php

/**
 * CE FICHIER DOIT AFFICHER UN ARTICLE ET SES COMMENTAIRES !
 * 
 * On doit d'abord récupérer le paramètre "id" qui sera présent en GET et vérifier son existence
 * Si on n'a pas de param "id", alors on affiche un message d'erreur !
 * 
 * Sinon, on va se connecter à la base de données, récupérer les commentaires du plus ancien au plus récent (SELECT * FROM comments WHERE article_id = ?)
 * 
 * On va ensuite afficher l'article puis ses commentaires
 */
require_once('liberaries/database.php');
require_once('liberaries/utils.php');

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

/**
 * 2. Connexion à la base de données avec PDO
 * Attention, on précise ici deux options :
 * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
 * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
 * 
 * PS : Vous remarquez que ce sont les mêmes lignes que pour l'index.php ?!
 */
// $pdo = getPdo();
/**
 * 3. Récupération de l'article en question
 * On va ici utiliser une requête préparée car elle inclue une variable qui provient de l'utilisateur : Ne faites
 * jamais confiance à ce connard d'utilisateur ! :D
 */
// $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");

// // On exécute la requête en précisant le paramètre :article_id 
// $query->execute(['article_id' => $article_id]);

// // On fouille le résultat pour en extraire les données réelles de l'article
// $article = $query->fetch();
$article = findArticle($article_id);

/**
 * 4. Récupération des commentaires de l'article en question
 * Pareil, toujours une requête préparée pour sécuriser la donnée filée par l'utilisateur (cet enfoiré en puissance !)
 */
// $query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
// $query->execute(['article_id' => $article_id]);
// $commentaires = $query->fetchAll();

$commentaires = findAllComments($article_id);

/**
 * 5. On affiche 
 */
$pageTitle = $article['title'];

render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id')); // fonction compact qui cree une table asociative qui remplace la fanction au decis
// render('articles/show', ['pageTitle' => $pageTitle,
//                         'article' => $article,
//                         'commentaires' => $commentaires,
//                         'article_id' => $article_id]);   // pageTitle se sont les variable necesaire pour l'affaichage
