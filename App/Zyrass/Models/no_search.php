<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare(
        'SELECT name FROM monsters WHERE search < 1 ORDER BY name'
    );
    $req->execute();
    $info_no_search = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'no_search';
    include '../../../Public/www/Views/layout.phtml';