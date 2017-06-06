<?php
    /*
    |-------------------------------------------------------------------------------------
    | Connexion à la base de donnée (BDD)
    |-------------------------------------------------------------------------------------
    */
    include '../Controllers/Connexion/bdd_connexion.php';
    extract($_POST);

    /*
    |-------------------------------------------------------------------------------------
    | Étape 1 : Sélection de tous les accessoires afin de les déplacer dans un tableau
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'accessoire'
    |-------------------------------------------------------------------------------------
    | Étape 2 : Sélection de tous les accessoires afin de les déplacer dans un tableau
    |-------------------------------------------------------------------------------------
    |   02 - Déplacement des accessoires dans le tableau $list_accs
    |-------------------------------------------------------------------------------------
    */
    // Étape 1
    $req = $dsn->prepare('SELECT name FROM accessories WHERE id >= 1');
    $req->execute();
    $result_accs = $req->fetchAll();
    $req->closeCursor();
    
    // Étape 2
    $list_accs = [];
    foreach ($result_accs as $reponse)
    {
        array_push($list_accs, $reponse['name']);
    }

    echo '<input type="hidden" name="<?= $result_accs->a_id; ?>">';


    if(in_array($accessory_name, $list_accs))
    {
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
                id AS "a_id",
                name AS "a_name",
                effect AS "a_effect",
                image AS "a_image"
            FROM accessories
            WHERE name LIKE "' . $accessory_name. '%"
        ');
        $req->execute();
        $result_accs = $req->fetch(PDO::FETCH_OBJ);
        $req->closeCursor();

        /*
        |-------------------------------------------------------------------------------------
        | Sélection des ingrédients en fonction du monstre recherché
        |-------------------------------------------------------------------------------------
        |   01 - Sélection de l'identifiant du monstre
        |   02 - Sélection du nom de l'ingrédient
        |   02 - Sélection de l'image de l'ingrédient
        |-------------------------------------------------------------------------------------
        */
        $req = $dsn->prepare(
            'SELECT
                accessories.name AS "name_accessory",
                monsters.id AS "id_monster",
                monsters.name AS "name_monster",
                monsters.image_monster AS "image_monsters"
            FROM monsters_accessories
            INNER JOIN monsters ON monsters_accessories.monsters_id = monsters.id
            INNER JOIN accessories ON monsters_accessories.accessories_id = accessories.id
            WHERE accessories.id = "' . $result_accs->a_id . '"
        ');
        $req->execute();
        $result_accessories_mobs = $req->fetchAll();
        $req->closeCursor();

        /*
        |-------------------------------------------------------------------------------------
        | Sélection de l'accessoire en fonction du monstre recherché
        |-------------------------------------------------------------------------------------
        |   01 - Sélection de l'identifiant du monstre
        |   02 - Sélection du nom de l'accessoire
        |   02 - Sélection de l'image de l'accessoire
        |-------------------------------------------------------------------------------------
        */
        $req = $dsn->prepare(
            'SELECT
                monsters.id AS "id_monster",
                accessories.name AS "a_name",
                accessories.image AS "a_image"
            FROM monsters_accessories
            INNER JOIN monsters ON monsters_accessories.monsters_id = monsters.id
            INNER JOIN accessories ON monsters_accessories.accessories_id = accessories.id
            WHERE monsters.id = ' . $result_accs->a_id . '
        ');
        $req->execute();
        $result_accessory_mobs = $req->fetch(PDO::FETCH_OBJ);
        $req->closeCursor();

        /*
        |-------------------------------------------------------------------------------------
        | Sélection des zones en fonction du monstre recherché
        |-------------------------------------------------------------------------------------
        |   01 - Sélection de l'identifiant du monstre
        |   02 - Sélection du nom de la zone
        |-------------------------------------------------------------------------------------
        */
        $req = $dsn->prepare(
            'SELECT
                monsters.id AS "id_monster",
                zoneds.name AS "zone_name"
            FROM monsters_zoneds
            INNER JOIN monsters ON monsters_zoneds.monsters_id = monsters.id
            INNER JOIN zoneds ON monsters_zoneds.zoneds_id = zoneds.id
            WHERE monsters.id = ' . $result_accs->a_id . '
        ');
        $req->execute();
        $result_zoneds_accs = $req->fetchAll();
        $req->closeCursor();

        /*
        |-------------------------------------------------------------------------------------
        | Sélection et affichage du template "phtml"
        |-------------------------------------------------------------------------------------
        */
        $template = 'result_accs';
        include '../../../Public/www/Views/layout.phtml';
    }

    else
    {
        /*
        |-------------------------------------------------------------------------------------
        | Redirection vers la page du formulaire si le traitement échoue
        |-------------------------------------------------------------------------------------
        */
        header("Location: index.php");
    }
