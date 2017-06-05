<?php
    /*
    |-------------------------------------------------------------------------------------
    | Connexion à la base de donnée (BDD)
    |-------------------------------------------------------------------------------------
    */
    include '../Controllers/Connexion/bdd_connexion.php';

    /*
    |-------------------------------------------------------------------------------------
    | Description de la requête SQL côté SELECT
    |-------------------------------------------------------------------------------------
    |   01 - Sélection d'une fonction d'agrégat pour calculer une l'expérience
    |   01 - Sélection d'une fonction d'agrégat pour calculer une l'or
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare('UPDATE visited SET visiteur = visiteur +1');
    $req->execute();
    $req->closeCursor();

    /*
    |-------------------------------------------------------------------------------------
    | Description de la requête SQL côté SELECT
    |-------------------------------------------------------------------------------------
    |   01 - Sélection d'une fonction d'agrégat pour calculer une l'expérience
    |   01 - Sélection d'une fonction d'agrégat pour calculer une l'or
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare('SELECT visiteur FROM visited');
    $req->execute();
    $info_compteur = $req->fetch(PDO::FETCH_OBJ);
    $req->closeCursor();

    // Sélection et affichage du template "phtml"
    $template = 'index';
    include '../../../Public/www/Views/layout.phtml';