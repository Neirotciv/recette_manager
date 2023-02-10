<?php
    require "./fonctions/gestionRecette.php";
    require "./fonctions/gestionIngredient.php";
    require "./fonctions/gestionMembre.php";
    
    $id = (int) $_GET['id'];
    deleteCategorieRecette($id);
    deleteIngredientFromRecette($id);
    deleteCommentairesFromRecette($id); 
    deleteRecette($id);

    header("location:/recettes.php");    
?>
