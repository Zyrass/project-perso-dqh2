<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare(
        'SELECT name, gold FROM monsters WHERE id >= 1 ORDER BY gold DESC'
    );
    $req->execute();
    $info_mobs_gold = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'mobs_gold';
    include '../../../Public/www/Views/layout.phtml';