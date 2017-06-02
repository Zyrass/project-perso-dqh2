<?php
    // Définition des constantes pour la connexion à la base de donnée.
    define('HOST', 'mysql:host=localhost;dbname=zyrass_dqh2');
    define('USER', 'root');
    define('PASSWORD', '');

    // On test la connexion à la base de donnée.
    try {
        $dsn = new PDO(HOST, USER, PASSWORD) or die(print_r($dsn->errorInfo()));
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dsn->exec('SET NAMES UTF8');
    } catch (PDOException $e) {
        die('Vous rencontrez un petit problème... ' . $e->getMessage());
    }
