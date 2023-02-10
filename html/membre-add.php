<?php
require "./fonctions/gestionMembre.php";

if (isset($_POST['ajouter'])) {
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : "";
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "";

    if (empty($pseudo)) {
        $errors .= "Le pseudo doit être renseigné<br>";
    }
    if (empty($nom)) {
        $errors .= "La nom doit être renseigné<br>";
    }
    if (empty($email)) {
        $errors .= "L'email doit être renseigné<br>";
    }
    if (empty($mdp)) {
        $errors .= "Le mot de passe doit être renseigné<br>";
    }
    if (empty($errors)) {
        createMembre($pseudo, $nom, $email, $mdp);
        header("location:/membres.php");
    }
}
?>
<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8"/>
    <title>
    Recette Manager
    </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="row">

        <div class="col-10 card shadow mx-auto mt-3">

            <div class="card-header text-center bg-dark text-light mt-2">
                <h3>AJOUT D'UN MEMBRE</h3>
            </div>

            <div class="card-content mt-3">

                <div class="alert alert—infok mb-3">
                    
                </div>

                <form method="post" action="membre-add.php">

                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Login</label>
                        <input type="text" class="form-control" name="pseudo" id="pseudo" value="" placeholder="Pseudo du membre.">
                    </div>

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" id="nom" value="" placeholder="Nom du membre.">
                    </div>                  

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="" placeholder="Email du membre.">
                    </div>

                    <div class="mb-3">
                        <label for="mdp" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe du membre.">
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="ajouter" class="btn btn-dark">AJOUTER</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>
