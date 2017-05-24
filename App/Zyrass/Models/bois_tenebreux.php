<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    // Le Bois ténébreux
    $req = $dsn->prepare(
        'SELECT monsters.name AS "nom_monstre", zoneds.name AS "nom_zone"
        FROM `monsters_zoneds` 
        INNER JOIN monsters ON monsters.id = monsters_id
        INNER JOIN zoneds On zoneds.id = zoneds_id
        WHERE zoneds.id = 9
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_bois_tenebreux = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'bois_tenebreux';
    include '../../../Public/www/Views/layout.phtml';