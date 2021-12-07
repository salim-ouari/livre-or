<!-- Sur cette page on voit l’ensemble des commentaires, organisés du plus
récent au plus ancien. Chaque commentaire doit être composé d’un texte
“posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
l’utilisateur est connecté, sur cette page figure également un lien vers la
page d’ajout de commentaire. -->

<?php
session_start();
// **************connection à la BDD*******************
require('connect.php');

?>
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
<header>
    <?php include 'header.php'; ?>
</header>
<main>
    <table>
        <?php
        $requete = mysqli_query($bdd, "SELECT * FROM commentaires INNER JOIN utilisateurs WHERE utilisateurs.id = commentaires.id_utilisateur
        ORDER BY commentaires.date DESC");
        $commentaires = mysqli_fetch_all($requete);

        // requete qui permet de recup le login associer au commentaire posté
        $requete2 = mysqli_query($bdd, "SELECT login FROM utilisateurs INNER JOIN commentaires WHERE
         commentaires.id_utilisateur = utilisateurs.id");
        $login = mysqli_fetch_assoc($requete2);

        // var_dump($commentaires);
        // var_dump($requete);

        foreach ($commentaires as $com) : ?>
            <tr>
                <td><span>Posté par:</span> <?= $login['login']; ?></td>
                <td><span>le</span> <?= $com[3]; ?></td>
                <td><?= $com[1]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
<?php include 'footer.php'; ?>

</html>