<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';

    $req = $dsn->prepare(
        'SELECT monsters.name AS "name", amounts.amount AS "amount"
        FROM monsters 
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id 
        WHERE amounts.amount_id = 1 
        ORDER BY name
    ');
    $req->execute();
    $info_amounts_one = $req->fetchAll();

    $req = $dsn->prepare(
        'SELECT monsters.name AS "name", amounts.amount AS "amount"
        FROM monsters 
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id 
        WHERE amounts.amount_id = 2
        ORDER BY name
    ');
    $req->execute();
    $info_amounts_two = $req->fetchAll();

    $req = $dsn->prepare(
        'SELECT monsters.name AS "name", amounts.amount AS "amount"
        FROM monsters 
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id 
        WHERE amounts.amount_id = 3
        ORDER BY name
    ');
    $req->execute();
    $info_amounts_three = $req->fetchAll();

    $req = $dsn->prepare(
        'SELECT monsters.name AS "name", amounts.amount AS "amount"
        FROM monsters 
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id 
        WHERE amounts.amount_id = 4 
        ORDER BY name
    ');
    $req->execute();
    $info_amounts_four = $req->fetchAll();

    $req = $dsn->prepare(
        'SELECT monsters.name AS "name", amounts.amount AS "amount"
        FROM monsters 
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id 
        WHERE amounts.amount_id = 5
        ORDER BY name
    ');
    $req->execute();
    $info_amounts_five = $req->fetchAll();

    $req = $dsn->prepare(
        'SELECT monsters.name AS "name", amounts.amount AS "amount"
        FROM monsters 
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id 
        WHERE amounts.amount_id = 6 
        ORDER BY name
    ');
    $req->execute();
    $info_amounts_six = $req->fetchAll();

    $req = $dsn->prepare(
        'SELECT monsters.name AS "name", amounts.amount AS "amount"
        FROM monsters 
        INNER JOIN amounts ON amounts.amount_id = monsters.amount_id 
        WHERE amounts.amount_id = 7 
        ORDER BY name
    ');
    $req->execute();
    $info_amounts_seven = $req->fetchAll();

    // Sélection et affichage du template "phtml"
    $template = 'amounts';
    include '../../../Public/www/Views/layout.phtml';