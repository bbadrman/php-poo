<?php

//render('article/show')
function render(string $path, array $variables = []){

    extract($variables); //La fonction extract() est une fonction intégrée à PHP. La fonction extract() effectue une conversion de tableau en variable. C'est-à-dire qu'il convertit les clés de tableau en noms de variables et les valeurs de tableau en valeur de variable. En d'autres termes, nous pouvons dire que la fonction extract() importe des variables d'un tableau dans la table des symboles.
    ob_start();  // temporaise l'affaichage 
    
    require('templates/'. $path .'.html.php');
    $pageContent = ob_get_clean();

    require('templates/layout.html.php');

}
 
function redirect(string $url){
    header("Location: $url");
    exit();

}