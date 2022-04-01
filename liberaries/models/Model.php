<?php

require_once('liberaries/database.php');

class Model {
    
    protected $pdo;    // reserve a moi et mes enfant

    public function __construct()
    {
        $this->pdo = getPdo();
    }

}