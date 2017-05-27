<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare('SELECT id, name, img FROM ingredients ORDER BY name');
    $req->execute();
    $info_ingredients = $req->fetchAll();

    $req = $dsn->prepare(
        'SELECT monsters.name AS "name_monster", monsters.image AS "image_monster", ingredients.id AS "id_ingredients"
        FROM monsters_ingredients
        INNER JOIN monsters ON monsters_id = monsters.id
        INNER JOIN ingredients ON ingredients_id = ingredients.id
        WHERE ingredients.id = 1'
    );
    $req->execute();
    $info_loot = $req->fetchAll();


    // Sélection et affichage du template "phtml"
    $template = 'ingredients';
    include '../../../Public/www/Views/layout.phtml';