<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    // Les Dunes damnées
    $req = $dsn->prepare(
        'SELECT monsters.name AS "nom_monstre", zoneds.name AS "nom_zone"
        FROM `monsters_zoneds` 
        INNER JOIN monsters ON monsters.id = monsters_id
        INNER JOIN zoneds On zoneds.id = zoneds_id
        WHERE zoneds.id = 8
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_dunes_damnees = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'dunes_damnees';
    include '../../../Public/www/Views/layout.phtml';