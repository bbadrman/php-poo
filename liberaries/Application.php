<?php

class Application{

    public static function process(){

        $controllerName = "Article";
        $task = "index";

        $controllerName = "\controllers\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$task();

    }
}