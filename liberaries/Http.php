<?php
/**
 * Redirige le visiteur vers $url
 * 
 * @param string $url
 * @return void
 */
class Http {
    public static function redirect(string $url)
    {
        header("Location: $url");
        exit();
    }
}