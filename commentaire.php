<!-- Ce formulaire ne contient qu’un champs permettant de rentrer son
commentaire et un bouton de validation. Il n’est accessible qu’aux
utilisateurs connectés. Chaque utilisateur peut poster plusieurs
commentaires. -->

<?php
session_start();
$error = '';

require('connect.php');

if (isset($_POST['submit'])) { // Si on presse sur le bouton commenter
    $name = $_POST['name']; // obtenir le nom du formulaire
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $requete = "INSERT INTO comments (name, email, comment)
			VALUES ('$name', '$email', '$comment')";
    $resultat = mysqli_query($bdd, $requete);
    if ($resultat) {
        echo $error = 'commentaire ajouté avec succés';
    } else {
        echo $error = "le commentaire n'a pas été ajouté";
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
    <div class="wrapper">
        <form action="" method="POST" class="form">
            <div class="row">
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your Name" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your Email" required>
                </div>
            </div>
            <div class="input-group textarea">
                <label for="comment">commentaire</label>
                <textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Poster commentaire</button>
            </div>
        </form>
        <div class="prev-comments">
            <?php

            $requete2 = "SELECT * FROM comments";
            $resultat2 = mysqli_query($bdd, $requete2);
            if (mysqli_num_rows($resultat2) != 0) {
                while ($user = mysqli_fetch_assoc($resultat2)) {

            ?>
                    <div class="single-item">
                        <h4><?php echo $row['name']; ?></h4>
                        <a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a>
                        <p><?php echo $user['comment']; ?></p>
                    </div>
            <?php

                }
            }

            ?>
        </div>
    </div>
</body>

</html>