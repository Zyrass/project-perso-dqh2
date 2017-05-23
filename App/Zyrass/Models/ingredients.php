<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare('SELECT * FROM ingredients ORDER BY name');
    $req->execute();
    $info_ingredients = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'ingredients';
    include '../../../Public/www/Views/layout.phtml';