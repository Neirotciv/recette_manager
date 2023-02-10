<?php
require_once('./fonctions/gestionMembre.php');
$membres = getMembres();
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
                    <h3>LISTE DES MEMBRES</h3>
                </div>

                <div class="my-2">
                    <a href="membre-add.php" class="float-end btn btn-success">AJOUTER</a>
                </div>

                <div class="card-content">

                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Date d'inscription</th>
                            <th scope="col" colspan="3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($membres as $membre): ?>
                                <tr>
                                    <td><?= $membre->id_membre; ?></td>                                
                                    <td><?= $membre->pseudo; ?></td>                                
                                    <td><?= $membre->nom; ?></td>
                                    <td><?= $membre->date_inscription?></td>
                                    <td>
                                        <a href="membre.php?id=<?= $membre->id_membre; ?>" id="get-<?= $membre->id_membre; ?>>" class="btn btn-info">VOIR</button>
                                    </td>
                                    <td>
                                        <a href="membre-update.php?id=<?= $membre->id_membre; ?>" id="update-<?= $membre->id_membre; ?>" class="btn btn-primary">MODIFIER</button>
                                    </td>
                                    <td>
                                        <a href="membre-delete.php?id=<?= $membre->id_membre; ?>" id="delete-<?= $membre->id_membre; ?>" class="btn btn-danger">SUPPRIMER</button>
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
