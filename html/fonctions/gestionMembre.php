<?php
require_once "database.php";

function getMembreNames() {
    try {
        $bdd = getDatabase();
        $sql = "SELECT id_membre, nom FROM membre;";
        $reponse = $bdd->query($sql);
        $noms = $reponse->fetchAll(PDO::FETCH_OBJ);
        $reponse->closeCursor();
        return $noms;
    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

// récupérer tous les membres
function getMembres() {
    try {
        $bdd = getDatabase();
        $sql = "SELECT * FROM membre;";
        $reponse = $bdd->query($sql);
        $membres = $reponse->fetchAll(PDO::FETCH_OBJ);
        $reponse->closeCursor();
        return $membres;
    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

// récupérer un membre suivant son id
function getMembreById($id) {
    try {
        $bdd = getDatabase();
        $sql = "SELECT * FROM membre WHERE id_membre = :id;";

        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        $sth->execute();

        $membre = $sth->fetch(PDO::FETCH_OBJ);
        $sth->closeCursor();
        return $membre;
    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

// ajouter un membre
function createMembre($pseudo, $nom, $email, $mdp) {
    try {
        $bdd = getDatabase();
        $sql = "INSERT INTO membre (pseudo, nom, email, mdp, date_inscription)
            VALUES(:pseudo, :nom, :email, :mdp, NOW());";
        
        $sth = $bdd->prepare($sql);
        $sth->bindValue("pseudo", $pseudo);
        $sth->bindValue("nom", $nom);
        $sth->bindValue("email", $email);
        $sth->bindValue("mdp", $mdp);
        
        $sth->execute();
        $sth->closeCursor();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

// mettre à jour un membre
function updateMembre($id, $pseudo, $nom, $email, $mdp) {
    try {
        $bdd = getDatabase();
        $sql = "UPDATE membre SET pseudo = :pseudo, nom = :nom, email = :email, mdp = :mdp WHERE id_membre = :id";

        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        $sth->bindValue('pseudo', $pseudo);
        $sth->bindValue('nom', $nom);
        $sth->bindValue('email', $email);
        $sth->bindValue('mdp', $mdp);

        $sth->execute();
        $sth->closeCursor();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

// supprimer un membre
function deleteMembre($id) {
    try {
        $bdd = getDatabase();
        $sql = "DELETE FROM membre WHERE id_membre = :id;";

        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        $sth->execute();

        $sth->closeCursor();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

function deleteCommentairesFromRecette($id) {
    try {
        $bdd = getDatabase();
        $sql = "DELETE FROM commentaire WHERE id_recette = :id;";

        $sth = $bdd->prepare($sql);
        $sth->bindValue('id', $id);
        $sth->execute();

        $sth->closeCursor();
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}