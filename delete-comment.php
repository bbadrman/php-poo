<?php

/**
 * DANS CE FICHIER ON CHERCHE A SUPPRIMER LE COMMENTAIRE DONT L'ID EST PASSE EN PARAMETRE GET !
 * 
 * On va donc vérifier que le paramètre "id" est bien présent en GET, qu'il correspond bien à un commentaire existant
 * Puis on le supprimera !
 */
require_once('liberaries/database.php');
require_once('liberaries/utils.php');
/**
 * 1. Récupération du paramètre "id" en GET
 */
if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ! Fallait préciser le paramètre id en GET !");
}

$id = $_GET['id'];


/**
 * 2. Connexion à la base de données avec PDO
 * Attention, on précise ici deux options :
 * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
 * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
 * 
 * PS : Vous remarquez que ce sont les mêmes lignes que pour l'index.php ?!
 */
//$pdo = getPdo(); On an deja sur fonction findComment()

/**
 * 3. Vérification de l'existence du commentaire
 */
// $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
// $query->execute(['id' => $id]);
$commentaire = finComment($id);
if (!$commentaire) {   //$query->rowCount() === 0 par !$commentaire
    die("Aucun commentaire n'a l'identifiant $id !");
}

/**
 * 4. Suppression réelle du commentaire
 * On récupère l'identifiant de l'article avant de supprimer le commentaire
 */

// $commentaire = $query->fetch(); en commentaire parceque en a deja sur function findComment()
$article_id = $commentaire['article_id'];

// $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
// $query->execute(['id' => $id]);  on remplace tous ca par deletComment($id);

deletComment($id);

/**
 * 5. Redirection vers l'article en question
 */
// header("Location: article.php?id=" . $article_id);
// exit();

redirect("article.php?id="  . $article_id);
