<!-- Ce formulaire ne contient qu’un champs permettant de rentrer son
commentaire et un bouton de validation. Il n’est accessible qu’aux
utilisateurs connectés. Chaque utilisateur peut poster plusieurs
commentaires. -->

<?php
session_start();
// connecte toi à la bdd
require('connect.php');
$error = '';

if (isset($_POST['commentaire'])) {
    $comment = $_POST['commentaire'];
    date_default_timezone_set('Europe/Paris');
    $date = date('Y-m-d H:i:s');
    $id = $_SESSION['utilisateurs']['id'];
    $requete = mysqli_query($bdd, "INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('$comment', '$id', '$date')");
}

if (isset($_POST['submit'])) { // Si on presse sur le bouton commenter

    header('Location: livre-or.php');

    $comment = htmlspecialchars($_POST['comment']);
}
if (empty($_SESSION)) {
    header('Location: index.php');
    exit();
}


//  alors insére le com dans la base de donnée

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Commentaire</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="wrapper">
        <form action="" method="POST" class="form">
            <div class="row">
                <div class="input-group textarea">
                    <label for="comment">Votre commentaire</label>
                    <textarea id="comment" name="comment" placeholder="" required></textarea>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Poster commentaire</button>
                </div>
        </form>

    </div>
</body>

</html>