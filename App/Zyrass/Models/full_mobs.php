<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare(
        'SELECT 
            monsters.name AS "monster_name", 
            monsters.image AS "monster_image", 
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
        FROM monsters_ingredients
        INNER JOIN monsters ON monsters_id = monsters.id
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id
        INNER JOIN ingredients ON ingredients_id = ingredients.id
        INNER JOIN accessories ON accessories.id = monsters.accessories_id
        WHERE monsters.id >= 1 
        ORDER BY monsters.name
    ');
    $req->execute();
    $info_mobs = $req->fetchAll();


    // Sélection et affichage du template "phtml"
    $template = 'full_mobs';
    include '../../../Public/www/Views/layout.phtml';