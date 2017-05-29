<?php
    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    /*
    |-------------------------------------------------------------------------------------
    | Déserg
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de la zone
    |   02 - Sélection de l'id du monstre
    |   03 - Sélection du nom du monstre
    |   04 - Sélection de l'expérience du monstre
    |   05 - Sélection de l'or du monstre
    |   06 - Sélection de l'avis de recherche
    |   07 - Sélection de la médaille du monstres
    |   08 - Sélection de l'image du monstre
    |   09 - Sélection de l'image de sa médaille
    |   10 - Sélection de la quantité de monstre à tuer
    |-------------------------------------------------------------------------------------
    */ 
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
            monsters.image_medal AS "medal_image",
            amounts.amount AS "a_amount"
        FROM `monsters_zoneds` 
        INNER JOIN monsters ON monsters.id = monsters_id        
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id        
        INNER JOIN zoneds On zoneds.id = zoneds_id
        WHERE zoneds.id = 2
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_bataille = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'deserg';
    include '../../../Public/www/Views/layout.phtml';