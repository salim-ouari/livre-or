<header>
    <h1>Mon Livre d'or</h1>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="livre-or.php">Livre d'or</a></li>
        <?php
        if (empty($_SESSION)) {
            echo '<li><a href="index.php">Inscription</a></li>
     <li><a href="index.php">Inscription</a></li>';
        } else {
            echo '<li><a href="commentaire.php">Commentaire</a></li>
    <li><a href="profil.php">Mon profil</a></li>
    <li><a href="deconnexion.php">Deconnexion</a></li>';
        }

        ?>
    </ul>
</header>