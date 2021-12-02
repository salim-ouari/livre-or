<header>
    <nav>
        <ul>
            <li><a href="index.php">Login</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <?php
            /* Condition if qui permet de se deconnecter */
            if (isset($_POST['deconnexion'])) {

                session_destroy();
                header('location: index.php');
            }
            ?>
        </ul>
    </nav>
</header>