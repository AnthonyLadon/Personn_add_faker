<?php



try {
    $connexionDb = new PDO(
        'mysql:host=localhost;dbname=poo_php',
        'root',
        'root'
    );
} catch (Exception $exc) {
    die('Erreur : ' . $exc->getMessage());
}
