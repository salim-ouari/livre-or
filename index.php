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
    <main>
        <img src="asset/undraw_world_9iqb.png" alt="image">

    </main>

    <?php include 'footer.php'; ?>

</body>

</html>