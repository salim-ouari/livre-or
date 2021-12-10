<!-- Cette page possède un formulaire permettant à
l’utilisateur de modifier ses informations. Ce
formulaire est par défaut pré-rempli avec les 
informations qui sont actuellement stockées en base
 de données. -->
<?php
session_start();
$error = "";

require('connect.php');

//si jappuie sur le bouton modif => je rentre dans la condition
if (isset($_POST['modif'])) {
    // definitions des variables 

    $id = $_SESSION['user']['id'];
    $newlogin = htmlspecialchars($_POST['login']);
    $newpassword = htmlspecialchars($_POST['password']);
    $newpassword_confirm = htmlspecialchars($_POST['password_confirm']);


    // condition champs vide
    if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['password_confirm'])) {

        $error = "veuillez remplir ce champs";
    } else {
        // condition mdp pas identique
        if ($newpassword != $newpassword_confirm) {
            $error = "Les mots de passe ne sont pas identiques.";
        } else {
            //requêtes sql pour update utilisateur
            $requete2 = "UPDATE utilisateurs SET login = '$newlogin', password = '$newpassword' WHERE id = $id";
            $modifprofil = mysqli_query($bdd, $requete2);

            // si requete est valide
            if ($modifprofil == true) {

                // je selectionne les news valeurs 
                $query = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE id = $id");
                $resultat = mysqli_fetch_assoc($query);
                // je réecris les news valeurs dans session
                $_SESSION['user'] = $resultat;

                header('location: connexion.php');
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <h1 id="ac"> MON PROFIL</h1>
    <main>
        <div id="myid">
            <form class="form" action="profil.php" method="post">
                <h2 class="mypro">MODIFIER PROFIL</h2>
                <table>
                    <tr>

                        <td>Nouveau Login<?php $_SESSION['user']['login']; ?></td>
                        <td><input type="text" name="login" value="<?php echo $_SESSION['user']['login']; ?>"></td>
                    </tr>
                    <tr>

                        <td>Nouveau Mot de passe</td>
                        <td><input type="password" name="password" placeholder="Ex : *****"></td>
                    </tr>
                    <tr>

                        <td>Confirmer nouveau mot de passe</td>
                        <td><input type="password" name="password_confirm" placeholder="Ex : *****"></td>
                    </tr>
                </table>
                <div id="but">
                    <button type="submit" name="modif">modifier</button>
                </div>
            </form>


        </div>
        <p>
            <?php echo $error; ?>
        </p>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>