<!-- Sur cette page on voit l’ensemble des commentaires, organisés du plus
récent au plus ancien. Chaque commentaire doit être composé d’un texte
“posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
l’utilisateur est connecté, sur cette page figure également un lien vers la
page d’ajout de commentaire. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre-or</title>
</head>

<body>

</body>
<?php include 'header.php'; ?>

<main>
    <?php
    // **************connection à la BDD*******************
    require('connect.php');

    $requete = mysqli_query($bdd, "SELECT * FROM utilisateurs INNER JOIN 'commentaires' WHERE 'utilisateurs.id' = 'commentaires.id_utlisateur' ORDER BY 
'commentaires.date' DESC");

    $comment = mysqli_fetch_all($requete, MYSQLI_ASSOC);

    foreach ($comment as $key => $value) {
        echo    '<div id = "table">
                    <table>
                    <thead>
                    <tr>
                        <th>' . $value['login'] . '</th>
                    </tr>
                    </thead>
                    <tbody>
                    <td>' . $value['commentaire'] . ' ' . 'Poster le ' . ' ' . date_format(date_create($value['date']), 'd/m/Y H:i:s') . '</td>
                    </tbody>
                    </table>
            </div>';
    }
    if (empty($_SESSION)) {
        echo '  <div class="centre">
                        <a href="connexion.php"><input id ="livre" type="submit" name= submit value="connecter vous ou inscrivez-vous pour poster un commentaires"></a>
                    </div>';
    } else {
        echo   '<div class="centre">
                        <a href="commentaire.php"><input id ="livre" type="submit" name= submit value="Poster un commentaires"></a>
                    </div>';
    }
    ?>
</main>

</html>