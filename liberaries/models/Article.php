<?php

namespace models;

require_once('liberaries/autoload.php');
// require_once('liberaries/models/Model.php');

 class Article extends Model   // extents saveut dire que hirite tous le code sur Model
 {
   protected $table = 'articles';
    
 }