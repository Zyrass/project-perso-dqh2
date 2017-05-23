<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare(
        'SELECT name
        FROM monsters
        WHERE id >= 1 
        ORDER BY name
    ');
    $req->execute();
    $info_mobs_qts = $req->fetchAll();


    // Sélection et affichage du template "phtml"
    $template = 'full_mobs';
    include '../../../Public/www/Views/layout.phtml';