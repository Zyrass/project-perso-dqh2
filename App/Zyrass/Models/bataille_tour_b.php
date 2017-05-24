<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    // La bataille de la tour : base
    $req = $dsn->prepare(
        'SELECT monsters.name AS "nom_monstre", zoneds.name AS "nom_zone"
        FROM `monsters_zoneds` 
        INNER JOIN monsters ON monsters.id = monsters_id
        INNER JOIN zoneds On zoneds.id = zoneds_id
        WHERE zoneds.id = 17
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_bataille_tour_base = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'bataille_tour_b';
    include '../../../Public/www/Views/layout.phtml';