<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare(
        'SELECT ingredients.name AS "name_ingredient", monsters.name AS "name_monstre"
        FROM monsters_ingredients 
        INNER JOIN monsters ON monsters.id = monsters_id
        INNER JOIN ingredients ON ingredients.id = ingredients_id
        WHERE (ingredients.name LIKE "A%")
        OR (ingredients.name LIKE "B%")
        OR (ingredients.name LIKE "C%")
        OR (ingredients.name LIKE "D%")
        OR (ingredients.name LIKE "E%")
        Or (ingredients.name LIKE "F%")
        OR (ingredients.name LIKE "G%")
        OR (ingredients.name LIKE "H%")
        OR (ingredients.name LIKE "I%")
        OR (ingredients.name LIKE "J%")
        OR (ingredients.name LIKE "K%")
        OR (ingredients.name LIKE "L%")
        OR (ingredients.name LIKE "M%")
    ');
    $req->execute();
    $info_mobs_ingredients_one = $req->fetchAll();


    $req = $dsn->prepare(
        'SELECT ingredients.name AS "name_ingredient", monsters.name AS "name_monstre"
        FROM monsters_ingredients 
        INNER JOIN monsters ON monsters.id = monsters_id
        INNER JOIN ingredients ON ingredients.id = ingredients_id
        WHERE (ingredients.name LIKE "N%")
        OR (ingredients.name LIKE "O%")
        OR (ingredients.name LIKE "P%")
        OR (ingredients.name LIKE "Q%")
        OR (ingredients.name LIKE "R%")
        OR (ingredients.name LIKE "S%")
        OR (ingredients.name LIKE "T%")
        OR (ingredients.name LIKE "U%")
        OR (ingredients.name LIKE "V%")
        OR (ingredients.name LIKE "W%")
        OR (ingredients.name LIKE "X%")
        OR (ingredients.name LIKE "Y%")
        OR (ingredients.name LIKE "Z%")
    ');
    $req->execute();
    $info_mobs_ingredients_two = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'mobs_ingredients';
    include '../../../Public/www/Views/layout.phtml';