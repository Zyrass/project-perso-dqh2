<?php
    /*
    |-------------------------------------------------------------------------------------
    | Connexion à la bdd
    |-------------------------------------------------------------------------------------
    */
    include '../Controllers/Connexion/bdd_connexion.php';

    /*
    |-------------------------------------------------------------------------------------
    | 01/16 - Sélection des ARCS (ID : 1)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 1
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_1 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 02/16 - Sélection des BAGUETTES (ID : 2)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 2
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_2 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 03/16 - Sélection des BÂTONS (ID : 3)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 3
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_3 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 04/16 - Sélection des BOOMERANGS (ID : 4)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 4
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_4 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 05/16 - Sélection des BOUCLIERS (ID : 5)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 5
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_5 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 06/16 - Sélection des TAROTS (ID : 6)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 6
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_6 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 07/16 - Sélection des LAMES (ID : 7)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 7
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_7 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 08/16 - Sélection des ÉPÉES à 1 main (ID : 8)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 8
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_8 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 09/16 - Sélection des ÉPÉES à 2 mains (ID : 9)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 9
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_9 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 10/16 - Sélection des ÉVANTAILS (ID : 10)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 10
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_10 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 11/16 - Sélection des FOUETS (ID : 11)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 11
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_11 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 12/16 - Sélection des GANTELETS (ID : 12)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 12
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_12 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 13/16 - Sélection des GRIFFES (ID : 13)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 13
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_12 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 14/16 - Sélection des HACHES (ID : 14)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 14
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_14 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 015/16 - Sélection des LANCES (ID : 15)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 15
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_15 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | 08/16 - Sélection des BOULIERS à 1 main (ID : 8)
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'arme
    |   02 - Sélection de l'effet de l'arme
    |   03 - Sélection de l'image de l'arme'
    |   04 - Sélection du nom du type d'arme
    |   05 - Réorganisé par ordre alphabétique
    |-------------------------------------------------------------------------------------
    */
    $req = $dsn->prepare(
        'SELECT 
            weapons.name    AS "w_name",
            weapons.effect  AS "w_effet", 
            weapons.image   AS "w_image",
            types.name  AS "t_name"
        FROM weapons
        INNER JOIN types ON types.id = weapons.type_id
        WHERE weapons.type_id = 16
        ORDER BY weapons.name'
    );
    $req->execute();
    $info_arms_16 = $req->fetchAll();

    /*
    |-------------------------------------------------------------------------------------
    | Sélection et affichage du template "phtml"
    |-------------------------------------------------------------------------------------
    */
    $template = 'arms';
    include '../../../Public/www/Views/layout.phtml';