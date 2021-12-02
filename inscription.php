<?php

require('connect.php');
$message = '';

if (
    !empty($_POST['login'])
    && !empty($_POST['password'])
    && !empty($_POST['password_confirm'])

) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['password_confirm']);

    $requete2 = mysqli_query($bdd, "SELECT * FROM `utilisateurs` WHERE login = '$login'");
    // recupérer la requete "est ce que j'ai un login déjà existant
    $resultat = mysqli_fetch_all($requete2);


    // si elle me renvoi rien "pas de login existant"
    if (count($resultat) == 0) {
        if ($password == $confirm_password) {

            //  alors inscrit le dans ma base de donnée
            $requete = mysqli_query($bdd, "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$login','$password') ");
            header('Location: connexion.php');
        } else {
            $message = 'les mots de passe ne sont pas identiques';
        }
    } else {
        $message = 'compte déjà existant';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <?php include 'header.php'; ?>
    </header>
    <h1 id="ac">INSCRIPTION</h1>
    <main>
        <div id="myid">
            <form class="form" action="inscription.php" method="post">
                <table>
                    <tr>

                        <td>Login</td>
                        <td><input type="text" name="login" placeholder="Ex : deggg@laplate.io" required></td>
                    </tr>
                    <tr>

                        <td>Mot de passe</td>
                        <td><input type="password" name="password" placeholder="Ex : *****" required></td>
                    </tr>
                    <tr>

                        <td>Confirmer mot de passe</td>
                        <td><input type="password" name="password_confirm" placeholder="Ex : *****"></td>
                    </tr>

                </table>
                <div id="but">
                    <button type="submit" name="Inscription">Inscription</button>

                    <?php
                    echo "<p>$message</p>";
                    ?>
                </div>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>