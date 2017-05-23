<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare('SELECT * FROM orbs');
    $req->execute();
    $info_orbs = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'orbs';
    include '../../../Public/www/Views/layout.phtml';