<?php

    // Connexion à la bdd
    include '../Controllers/Connexion/bdd_connexion.php';
    /*
    |-------------------------------------------------------------------------------------
    | Rappel des types de médaille
    |-------------------------------------------------------------------------------------
    |   01 - Escorte
    |   02 - Remplaçant
    |   03 - Sentinelle
    |-------------------------------------------------------------------------------------
    */

    /*
    |-------------------------------------------------------------------------------------
    | Calcul du nombre de médaille enregistrer
    |-------------------------------------------------------------------------------------
    */    
    $req = $dsn->prepare(
        'SELECT COUNT(id) AS "Nombre d\'enregistrement" FROM medals');
    $req->execute();
    $info_medals_escorte = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | Selection uniquement des Escortes
    |-------------------------------------------------------------------------------------
    */    
    $req = $dsn->prepare(
        'SELECT name, image, type
        FROM medals
        WHERE type = "Escorte" 
        ORDER BY name
    ');
    $req->execute();
    $info_medals_escorte = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | Selection uniquement des Remplaçants
    |-------------------------------------------------------------------------------------
    */    
    $req = $dsn->prepare(
        'SELECT name, image, type
        FROM medals
        WHERE type = "Remplaçant" 
        ORDER BY name
    ');
    $req->execute();
    $info_medals_remplaçant = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | Selection uniquement des Sentinelles
    |-------------------------------------------------------------------------------------
    */    
    $req = $dsn->prepare(
        'SELECT name, image, type
        FROM medals
        WHERE type = "Sentinelle" 
        ORDER BY name
    ');
    $req->execute();
    $info_medals_sentinelle = $req->fetchAll();    

    /*
    |-------------------------------------------------------------------------------------
    | Selection de TOUTES LES MÉDAILLES (Escorte / Sentinelle / Remplaçant)
    |-------------------------------------------------------------------------------------
    */    
    $req = $dsn->prepare(
        'SELECT *
        FROM medals 
        WHERE id >= 1
        ORDER BY name
    ');
    $req->execute();
    $info_medals_all = $req->fetchAll();


    /*
    |-------------------------------------------------------------------------------------
    | Sélection et affichage du template "phtml"
    |-------------------------------------------------------------------------------------
    */
    $template = 'medals';
    include '../../../Public/www/Views/layout.phtml';