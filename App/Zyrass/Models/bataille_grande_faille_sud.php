<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    // La bataille de la Grande faille : sud
    $req = $dsn->prepare(
        'SELECT monsters.name AS "nom_monstre", zoneds.name AS "nom_zone"
        FROM `monsters_zoneds` 
        INNER JOIN monsters ON monsters.id = monsters_id
        INNER JOIN zoneds On zoneds.id = zoneds_id
        WHERE zoneds.id = 21
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_bataille_grande_faille_sud = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'bataille_grande_faille_sud';
    include '../../../Public/www/Views/layout.phtml';