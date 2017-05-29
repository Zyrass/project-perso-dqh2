<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    // La bataille d'Accordia
    $req = $dsn->prepare(
        'SELECT
            zoneds.name AS "nom_zone",
            monsters.id AS "m_id",
            monsters.name AS "m_name",
            monsters.experience AS "m_exp",
            monsters.gold AS "m_gold",
            monsters.search AS "m_search",
            monsters.medal AS "m_medal",
            monsters.image_monster AS "m_image",
            monsters.image_medal AS "medal_image"
        FROM `monsters_zoneds` 
        INNER JOIN monsters ON monsters.id = monsters_id        
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id        
        INNER JOIN zoneds On zoneds.id = zoneds_id
        WHERE zoneds.id = 16
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_bataille_accordia = $req->fetchAll();');
    
    $req->execute();
    $info_mobs = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'bataille_accordia';
    include '../../../Public/www/Views/layout.phtml';