<?php


spl_autoload_register(function ($className){

    // className = Controllers\Article
    // require = liberaries/controllers/Article.php;

    $className = str_replace("\\", "/", $className);
    // $sources = array("Controllers/$className.php", "liberaries/$className.php ",  "Models/$className.php ");

    
      require_once("liberaries/$className.php");

});

