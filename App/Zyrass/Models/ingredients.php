<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare('SELECT id, name, img FROM ingredients ORDER BY name');
    $req->execute();
    $info_ingredients = $req->fetchAll();

    $req = $dsn->prepare(
        'SELECT monsters.name AS "name_monster", monsters.image_monster AS "image_monster"
        FROM ingredients 
        INNER JOIN monsters_ingredients ON monsters_ingredients.ingredients_id = ingredients.id
        INNER JOIN monsters ON monsters_ingredients.monsters_id = monsters.id
        WHERE ingredients.id = 8'
    );
    $req->execute();
    $info_loot = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'ingredients';
    include '../../../Public/www/Views/layout.phtml';