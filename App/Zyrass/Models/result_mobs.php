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
    | Étape 1 : Sélection de tous les monstres afin de les déplacer dans un tableau
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom du monstre
    |-------------------------------------------------------------------------------------
    | Étape 2 : Sélection de tous les monstres afin de les déplacer dans un tableau
    |-------------------------------------------------------------------------------------
    |   02 - Déplacement des monstres dans le tableau $list_mobs
    |-------------------------------------------------------------------------------------
    */
    // Étape 1
    $req = $dsn->prepare('SELECT name FROM monsters WHERE id >= 1');
    $req->execute();
    $result_mobs = $req->fetchAll();
    $req->closeCursor();
    
    // Étape 2
    $list_mobs = [];
    foreach ($result_mobs as $reponse)
    {
        array_push($list_mobs, $reponse['name']);
    }

    echo '<input type="hidden" name="<?= $result_mobs->m_id; ?>">';


    if(in_array($monster_name, $list_mobs))
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
            WHERE monsters.name LIKE "' . $monster_name. '%"
        ');
        $req->execute();
        $result_mobs = $req->fetch(PDO::FETCH_OBJ);
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
                monsters.id AS "id_monster",
                ingredients.name AS "ingredient_name",
                ingredients.img AS "ingredient_image"
            FROM monsters_ingredients
            INNER JOIN monsters ON monsters_ingredients.monsters_id = monsters.id
            INNER JOIN ingredients ON monsters_ingredients.ingredients_id = ingredients.id
            WHERE monsters.id = ' . $result_mobs->m_id . '
        ');
        $req->execute();
        $result_ingredient_mobs = $req->fetchAll();
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
            WHERE monsters.id = ' . $result_mobs->m_id . '
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
            WHERE monsters.id = ' . $result_mobs->m_id . '
        ');
        $req->execute();
        $result_zoneds_mobs = $req->fetchAll();
        $req->closeCursor();

        /*
        |-------------------------------------------------------------------------------------
        | Sélection et affichage du template "phtml"
        |-------------------------------------------------------------------------------------
        */
        $template = 'result_mobs';
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
