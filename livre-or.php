<!-- Sur cette page on voit l’ensemble des commentaires, organisés du plus
récent au plus ancien. Chaque commentaire doit être composé d’un texte
“posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
l’utilisateur est connecté, sur cette page figure également un lien vers la
page d’ajout de commentaire. -->



<?php
if (isset($_POST['envoyer'])) {

    $id = $_SESSION['id_user'];
    $msg = $_POST['message'];
    $date = date('Y-m-d');
    $heure = date('H:i');
    $req1 = mysqli_query($cn, "insert into message values (NULL,'$msg','$date','$heure','$id')");
    header("location:forum.php");
}

?>