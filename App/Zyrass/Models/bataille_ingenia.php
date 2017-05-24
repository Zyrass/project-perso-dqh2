<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    // La bataille de d'Ingénia
    $req = $dsn->prepare(
        'SELECT monsters.name AS "nom_monstre", zoneds.name AS "nom_zone", monsters.experience AS "exp", monsters.gold AS "or", monsters.search AS "search", monsters.medal AS "medals"
        FROM `monsters_zoneds` 
        INNER JOIN monsters ON monsters.id = monsters_id
        INNER JOIN zoneds On zoneds.id = zoneds_id
        WHERE zoneds.id = 15
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_bataille_ingenia = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'bataille_ingenia';
    include '../../../Public/www/Views/layout.phtml';