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
    | Étape 1 : Sélection de tous les ingrédients afin de les déplacer dans un tableau
    |-------------------------------------------------------------------------------------
    |   01 - Sélection du nom de l'ingrédient
    |-------------------------------------------------------------------------------------
    | Étape 2 : Sélection de tous les ingrédients afin de les déplacer dans un tableau
    |-------------------------------------------------------------------------------------
    |   02 - Déplacement des ingrédients dans le tableau $list_ingre
    |-------------------------------------------------------------------------------------
    */
    // Étape 1
    $req = $dsn->prepare('SELECT name FROM ingredients WHERE id >= 1');
    $req->execute();
    $result_ingre = $req->fetchAll();
    $req->closeCursor();
    
    // Étape 2
    $list_ingre = [];
    foreach ($result_ingre as $reponse)
    {
        array_push($list_ingre, $reponse['name']);
    }

    echo '<input type="hidden" name="<?= $result_ingre->i_id; ?>">';

    if(in_array($ingredient_name, $list_ingre))
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
                id AS "i_id",
                name AS "i_name",
                img AS "i_image"
            FROM ingredients
            WHERE name LIKE "' . $ingredient_name. '%"
        ');
        $req->execute();
        $result_ingre = $req->fetch(PDO::FETCH_OBJ);
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
                ingredients.name AS "name_ingredient",
                monsters.id AS "id_monster",
                monsters.name AS "name_monster",
                monsters.image_monster AS "image_monsters"
            FROM monsters_ingredients
            INNER JOIN monsters ON monsters_ingredients.monsters_id = monsters.id
            INNER JOIN ingredients ON monsters_ingredients.ingredients_id = ingredients.id
            WHERE ingredients.id = "' . $result_ingre->i_id . '"
        ');
        $req->execute();
        $result_ingredients_mobs = $req->fetchAll();
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
                ingredients.name AS "i_name",
                ingredients.img AS "i_image"
            FROM monsters_ingredients
            INNER JOIN monsters ON monsters_ingredients.monsters_id = monsters.id
            INNER JOIN ingredients ON monsters_ingredients.ingredients_id = ingredients.id
            WHERE monsters.id = "' . $result_ingre->i_id . '"
        ');
        $req->execute();
        $result_ingredients_mobs_two = $req->fetch(PDO::FETCH_OBJ);
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
            WHERE monsters.id = "' . $result_ingre->i_id . '"
        ');
        $req->execute();
        $result_zoneds_accs = $req->fetchAll();
        $req->closeCursor();

        /*
        |-------------------------------------------------------------------------------------
        | Sélection et affichage du template "phtml"
        |-------------------------------------------------------------------------------------
        */
        $template = 'result_ingre';
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
