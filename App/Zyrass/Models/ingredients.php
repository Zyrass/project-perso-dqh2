<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';


    $req = $dsn->prepare(
        'SELECT id, name, img 
        FROM ingredients 
        ORDER BY name
    ');
    $req->execute();
    $info_all_loot = $req->fetchAll();


    $req = $dsn->prepare(
        'SELECT
            ingredients.id      AS "id_ingredient",
            ingredients.name    AS "name_ingredient",
            ingredients.img     AS "image_ingredient",
            monsters.name       AS "name_monster"
        FROM monsters_ingredients 
        INNER JOIN monsters ON monsters.id = monsters_ingredients.monsters_id
        INNER JOIN ingredients ON ingredients.id = monsters_ingredients.ingredients_id
        WHERE ingredients.id = ?'
    );
    $req->execute(array("id"));
    $info_id_loot = $req->fetch();
    


    // Sélection et affichage du template "phtml"
    $template = 'ingredients';
    include '../../../Public/www/Views/layout.phtml';