<?php
require_once "database.php";

// ajouter une recette
function createRecette($titre, $auteur, $description, $photo) {
    try {
        $bdd = getDatabase();
        $sql = "INSERT INTO recette (titre, auteur, date_creation, description, photo, id_membre)
                VALUES(:titre, :auteur, NOW(), :description, :photo, :id_membre);";
        $sth = $bdd->prepare($sql);
        $sth->bindValue("titre", $titre);
        $sth->bindValue("auteur", $auteur);
        $sth->bindValue("description", $description);
        $sth->bindValue("photo", $photo);
        $sth->bindValue("id_membre", 1);
        $sth->execute();
        $sth->closeCursor();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

// récupérer toutes les recettes
function getRecettes() {
    try {
        $bdd = getDatabase();
        $sql = "SELECT * FROM recette;";
        $reponse = $bdd->query($sql);
        $recettes = $reponse->fetchAll(PDO::FETCH_OBJ);
        $reponse->closeCursor();
        return $recettes;
    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

// récupérer une recette suivant son id
function getRecetteById($id) {
    try {
        $bdd = getDatabase();
        $sql = "SELECT * FROM recette WHERE id_recette = :id;";

        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        $sth->execute();

        $recette = $sth->fetch(PDO::FETCH_OBJ);
        $sth->closeCursor();
        return $recette;
    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

// mettre à jour une recette
function updateRecette($id, $titre, $description, $photo, $auteur) {
    try {
        $bdd = getDatabase();
        $sql = "UPDATE recette SET titre = :titre, description = :description, photo = :photo, auteur = :auteur WHERE id_recette = :id";

        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        $sth->bindValue('titre', $titre);
        $sth->bindValue('description', $description);
        $sth->bindValue('photo', $photo);
        $sth->bindValue('auteur', $auteur);

        $sth->execute();
        $sth->closeCursor();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

// supprimer une recette
function deleteRecette($id) {
    try {
        $bdd = getDatabase();
        $sql = "DELETE FROM recette WHERE id_recette = :id;";

        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        $sth->execute();

        $sth->closeCursor();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

function deleteCategorieRecette($id) {
    try {
        $bdd = getDatabase();
        $sql = "DELETE FROM categorie_recette WHERE id_recette = :id;";

        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        $sth->execute();

        $sth->closeCursor();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}