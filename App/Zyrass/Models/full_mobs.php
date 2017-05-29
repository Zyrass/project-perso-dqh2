<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    /*
    |-------------------------------------------------------------------------------------
    | Sélection du monstre selon plusieurs critères
    |-------------------------------------------------------------------------------------
    |   01 - Sélection de l'id du monstre
    |   02 - Sélection du nom du monstre
    |   03 - Sélection de l'expérience du monstre
    |   04 - Sélection de l'or du monstre
    |   05 - Sélection de l'avis de recherche
    |   06 - Sélection de la médaille du monstres
    |   07 - Sélection de la quantité de monstre à tuer
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            monsters.id AS "m_id",
            monsters.name AS "m_name",
            monsters.experience AS "m_exp",
            monsters.gold AS "m_gold",
            monsters.search AS "m_search",
            monsters.medal AS "m_medal",
            monsters.image_monster AS "m_image",
            monsters.image_medal AS "medal_image",
            amounts.amount AS "m_amount" /* Affichage de la quantité de mobs à kill */ 
        FROM monsters
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id
        WHERE monsters.id >= 1
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_mobs = $req->fetchAll();




    /** A revoir

    $req = $dsn->prepare(
        'SELECT 
            monsters.name AS "monster_name",
            monsters.id AS "monster_id",
            monsters.image_monster AS "monster_image", 
            amounts.amount AS "amount", 
            monsters.medal AS "monster_medal", 
            monsters.search AS "monster_search", 
            monsters.experience AS "monster_experience", 
            monsters.gold AS "monster_gold",
            monsters.ingredient_id_one AS "ingredient_id_one",
            monsters.ingredient_id_two AS "ingredient_id_two",
            ingredients.name AS "ingredients_name",
            ingredients.img AS "ingredients_image",
            accessories.name AS "accessories_name",
            accessories.image AS "accessories_image",
            monsters.accessories_id AS "monster_accessories"
        FROM monsters
        INNER JOIN monsters_ingredients ON monsters_id = monsters.id
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id
        INNER JOIN ingredients ON ingredients_id = ingredients.id
        INNER JOIN accessories ON accessories.id = monsters.accessories_id
        WHERE monsters.id <= 195
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_mobs_save = $req->fetchAll();

**/








    // Sélection et affichage du template "phtml"
    $template = 'full_mobs';
    include '../../../Public/www/Views/layout.phtml';