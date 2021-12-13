<!-- Ce formulaire ne contient qu’un champs permettant de rentrer son
commentaire et un bouton de validation. Il n’est accessible qu’aux
utilisateurs connectés. Chaque utilisateur peut poster plusieurs
commentaires. -->

<?php
session_start();
// var_dump($_SESSION['user']['id']);

// connecte toi à la bdd
require('connect.php');
$error = '';

if (isset($_POST['submit'])) {
    if (!empty($_POST['comment'])) {
        $comment = $_POST['comment'];
        $id = $_SESSION['user']['id'];
        $requete = mysqli_query($bdd, "INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('$comment', '$id', NOW())");
        header('Location: livre-or.php');
    } else {
        $error = 'veuillez remplir le champs';
    }
}

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
    <header>
        <?php include 'header.php'; ?>
    </header>
    <main class="main-com">

        <img id="imgcom" src="asset/undraw_Super_thank_you_re_f8bo.png" alt="illustration">

        <div class="container">
            <h1 class="comh1">POST UN COM !!!</h1>
            <p id="postcom">Envie de nous envoyer un message d’amour ? N’hésite pas à utiliser ce formulaire pour poster un commentaire qui apparaîtra sur le livre d'or !</p>
            <form action="" method="post">

                <div class="bloc-com">
                    <label for="comment">Votre Commentaire</label>
                    <textarea id="message" name="comment" placeholder="Ecrivez ici..." required></textarea>
                </div>
                <div class="poster">
                    <button type="submit" name="submit" id="comm">Poster</button>
                </div>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>