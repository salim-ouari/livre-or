<!-- Ce formulaire ne contient qu’un champs permettant de rentrer son
commentaire et un bouton de validation. Il n’est accessible qu’aux
utilisateurs connectés. Chaque utilisateur peut poster plusieurs
commentaires. -->

<?php
session_start();
var_dump($_SESSION['user']['id']);

/* Condition if qui permet de se deconnecter */
if (isset($_POST['deconnexion'])) {

    session_destroy();
    header('location: index.php');
}

// connecte toi à la bdd
require('connect.php');
$error = '';

if (isset($_POST['submit'])) {
    if (!empty($_POST['comment'])) {
        $comment = $_POST['comment'];
        // date_default_timezone_set('Europe/Paris');
        // $date = date('Y-m-d H:i:s');
        $id = $_SESSION['user']['id'];
        $requete = mysqli_query($bdd, "INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('$comment', '$id', NOW())");
        header('Location: livre-or.php');
        var_dump($requete);
    } else {
        $error = 'veuillez remplir le champs';
    }
}




?>

<!-- // alors insére le com dans la base de donnée -->



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Commentaire</title>
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <div class="wrapper">
        <form action="" method="POST" class="form">
            <div class="row">
                <div class="input-group textarea">
                    <label for="comment">Votre commentaire</label>
                    <textarea id="comment" name="comment" placeholder="Tapez ici votre commentaire..." required></textarea>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Poster commentaire</button>
                </div>
        </form>
    </div>
    <form class="deco" action="" method="post"><button type="submit" name="deconnexion">Déconnexion</button></form>

</body>

</html>