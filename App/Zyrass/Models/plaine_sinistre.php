<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    // La Plaine sinisté
    $req = $dsn->prepare(
        'SELECT monsters.name AS "nom_monstre", zoneds.name AS "nom_zone", monsters.experience AS "exp", monsters.gold AS "or", monsters.search AS "search", monsters.medal AS "medals"
        FROM `monsters_zoneds` 
        INNER JOIN monsters ON monsters.id = monsters_id
        INNER JOIN zoneds On zoneds.id = zoneds_id
        WHERE zoneds.id = 7
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_plaine_sinistre = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'plaine_sinistre';
    include '../../../Public/www/Views/layout.phtml';