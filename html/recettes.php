<?php
require_once('./fonctions/gestionRecette.php');
$recettes = getRecettes();
?>

<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8"/>
    <title>
        Recette Manager
    </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <div class="row">

            <div class="col-10 card shadow mx-auto mt-3">

                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>LISTE DES RECETTES</h3>
                </div>

                <div class="my-2">
                    <a href="recette-add.php" class="float-end btn btn-success">AJOUTER</a>
                </div>

                <div class="card-content">

                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            <th scope="col">Titre</th>
                            <th scope="col">Description</th>
                            <th scope="col" colspan="3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recettes as $recette): ?>
                                <tr>
                                    <td><?= $recette->id_recette; ?></td>
                                    <td><img src="./img/<?= $recette->photo; ?>" width="50" height="40" /></td>                                
                                    <td><?= $recette->titre ?></td>
                                    <td><?= $recette->description; ?></td>
                                    <td>
                                        <a href="recette.php?id=<?= $recette->id_recette; ?>" id="get-<?= $recette->id_recette; ?>" class="btn btn-info">VOIR</button>
                                    </td>
                                    <td>
                                        <a href="recette-update.php?id=<?= $recette->id_recette; ?>" id="update-<?= $recette->id_recette; ?>" class="btn btn-primary">MODIFIER</button>
                                    </td>
                                    <td>
                                        <a href="recette-delete.php?id=<?= $recette->id_recette; ?>" id="delete-<?= $recette->id_recette; ?>" class="btn btn-danger">SUPPRIMER</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>
    <script>

    </script>
</body>
</html>
