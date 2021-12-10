<?php
session_start();
$error = "";

// /* Condition if qui permet de se deconnecter */
// if (isset($_POST['deconnexion'])) {

//     session_destroy();
//     header('location: index.php');
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main class="flex">
        <div class="imgacc">
            <img id="book" src="asset/A Livre Ouvert.png" alt="book">
            <img id="book2" src="asset/conifer-book-open.png" alt="image" height="500px">
        </div>
    </main>

    <?php include 'footer.php'; ?>

</body>

</html>