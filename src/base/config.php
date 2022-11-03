<?php


namespace App\Demo\connexion;


class Connexion
{
    public static function getConnexion()
    {
        return new \PDO(
            'mysql:host=localhost;dbname=poo_php',
            'root',
            'root'
        );
    }
}
