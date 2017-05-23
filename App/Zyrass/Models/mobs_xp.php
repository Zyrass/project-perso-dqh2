<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare(
        'SELECT name, experience FROM monsters WHERE id >= 1 ORDER BY experience DESC'
    );
    $req->execute();
    $info_mobs_xp = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'mobs_xp';
    include '../../../Public/www/Views/layout.phtml';