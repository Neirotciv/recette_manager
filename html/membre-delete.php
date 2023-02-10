<?php
    require "./fonctions/gestionMembre.php";
    
    $id = (int) $_GET['id'];
    deleteMembre($id);

    header("location:/membres.php");    
?>
