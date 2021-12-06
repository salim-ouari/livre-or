<header>
    <nav>
        <h1>Mon Livre d'or</h1>
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
                <li><a href="index.php">Deconnexion</a></li>';
            <?php  } ?>

        </ul>
    </nav>
</header>