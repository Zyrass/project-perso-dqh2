<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare(
        'SELECT name FROM monsters WHERE medal != 0 ORDER BY name'
    );
    $req->execute();
    $info_mobs_search = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'mobs_search';
    include '../../../Public/www/Views/layout.phtml';