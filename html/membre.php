<?php
require "./fonctions/gestionMembre.php";
$id = (int) $_GET['id'];
$membre = getMembreById($id);
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
                <a href="/membres.php"><-- Retour au membres</a>

                <div class="card-header text-center bg-dark text-light mt-2">
                    <h3>INFORMATION MEMBRE</h3>
                </div>
                <div class="card-content">

                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="30%">ID : <?= $membre->id_membre; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="30%">Pseudo : <?= $membre->pseudo; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="30%">Nom : <?= $membre->nom; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="30%">Email : <?= $membre->email; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="30%">Date d'inscription : <?= $membre->date_inscription; ?></td>
                                <td></td>
                            </tr>                                                                                                                                                                     
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
