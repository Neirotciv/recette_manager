<?php
require_once "database.php";

// récupérer toutes les ingrédients d’une recette
function getConcatIngredientsFromRecetteId($id) {
    try {
        $bdd = getDatabase();

        $sql = "SELECT
        CONCAT(
            i.quantite, ' ',
            i.unite, ' ',
            i.nom
        ) 
        AS concat_list
        FROM recette AS r
        INNER JOIN ingredient AS i ON i.id_recette = r.id_recette
        WHERE r.id_recette = :id;";

        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        
        $sth->execute();
        $ingredients = $sth->fetchAll(PDO::FETCH_OBJ);
        $sth->closeCursor();
        return $ingredients;
    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

// récupérer tous les ingrédients d’une recette
function getIngredientsFromRecette($id) {
    try {
        $bdd = getDatabase();
        $sql = "SELECT * FROM ingredient WHERE id_recette = :id;";
        
        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        
        $sth->execute();
        $ingredients = $sth->fetchAll(PDO::FETCH_OBJ);
        $sth->closeCursor();
        return $ingredients;
    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

// récupérer un ingrédient suivant son id
function getIngredient($id) {
    try {
        $bdd = getDatabase();
        $sql = "SELECT * FROM ingredient WHERE id_ingredient = :id;";
        
        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        
        $sth->execute();
        $ingredients = $sth->fetchAll(PDO::FETCH_OBJ);
        $sth->closeCursor();
        return $ingredients;
    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

// ajouter un ingrédient à une recette
function createIngredient($nom, $quantite, $unite, $id_recette) {
    try {
        $bdd = getDatabase();
        $sql = "INSERT INTO ingredient (nom, quantite, unite, id_recette)
                VALUES(:nom, :quantite, :unite, :id_recette);";
        
        $sth = $bdd->prepare($sql);
        $sth->bindValue("nom", $nom);
        $sth->bindValue("quantite", $quantite);
        $sth->bindValue("unite", $unite);
        $sth->bindValue("id_recette", $id_recette);

        $sth->execute();
        $sth->closeCursor();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

// supprimer tous les ingrédients d’une recette
function deleteIngredientFromRecette($id) {
    try {
        $bdd = getDatabase();
        $sql = "DELETE FROM ingredient WHERE id_recette = :id;";

        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);

        $sth->execute();
        $sth->closeCursor();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}