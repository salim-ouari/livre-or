<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Gwendolyn:wght@700&display=swap" rel="stylesheet">

<header>
    <div>
        <h1 id="title">MON LIVRE D'OR</h1>
    </div>

    <nav>

        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="livre-or.php">Livre d'or</a></li>
            <?php
            if (empty($_SESSION)) {
            ?>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>

            <?php } else { ?>

                <li><a href="commentaire.php">Commentaire</a></li>
                <li><a href="profil.php">Mon profil</a></li>
                <li><a href="déconnect.php">Déconnexion</a></li>



            <?php  }
            ?>

        </ul>

    </nav>
</header>