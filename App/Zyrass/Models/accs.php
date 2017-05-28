<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare(
        'SELECT name, effect, image
        FROM accessories
        ORDER BY name'
    );
    $req->execute();
    $info_accs = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'accs';
    include '../../../Public/www/Views/layout.phtml';