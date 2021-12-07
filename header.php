<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<header>
    <div id="h1">
        <h1>MON LIVRE D'OR</h1>
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

            <?php  } ?>

        </ul>
    </nav>
</header>