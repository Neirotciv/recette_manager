<?php
require "./fonctions/gestionRecette.php";
require "./fonctions/gestionMembre.php";
$id = (int) $_GET['id'];

$errors = "";

if (isset($_POST['modifier'])) {
    $titre = isset($_POST['titre']) ? $_POST['titre'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $photo = isset($_POST['photo']) ? $_POST['photo'] : "";
    $auteur = isset($_POST['auteur']) ? $_POST['auteur'] : "";

    if (empty($titre)) {
        $errors .= "Le titre doit être renseigné<br>";
    }
    if (empty($description)) {
        $errors .= "La description doit être renseigné<br>";
    }
    if (empty($photo)) {
        $errors .= "Le photo doit être renseigné<br>";
    }
    if (empty($auteur)) {
        $errors .= "L'auteur doit être renseigné<br>";
    }
    if (empty($errors)) {
        updateRecette($id, $titre, $description, $photo, $auteur);
        header("location:/recettes.php");
    }
}

$recette = getRecetteById($id);
$membres = getMembreNames();
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
            <a href="/recettes.php"><-- Retour au recettes</a>

            <div class="card-header text-center bg-dark text-light mt-2">
                <h3>MODIFICATION D'UNE RECETTE</h3>
            </div>

            <div class="card-content mt-3">

                <div class="alert alert—infok mb-3">
                    <?= $errors; ?>
                </div>

                <form method="post" action="recette-update.php?id=<?= $recette->id_recette; ?>">

                    <div class="mb-3">
                        <label for="titre" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="titre" id="titre" value="<?= $recette->titre; ?>" placeholder="Titre de la recette.">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="<?= $recette->description; ?>" placeholder="Description de la recette.">
                    </div>                    

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="text" class="form-control" name="photo" id="photo" value="<?= $recette->photo; ?>" placeholder="Photo de la recette.">
                    </div>

                    <div class="mb-3">
                        <label for="auteur" class="form-label">Auteur</label>
                        <select name="auteur" class="selectpicker">
                            <?php foreach($membres as $membre): ?>
                                <option value="<?= $membre->nom; ?>"><?= $membre->nom; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="modifier" class="btn btn-dark">MODIFIER</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>
