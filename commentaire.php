<?php
$title = "Page Commentaire";
require 'header.php';
require 'bdd.php';

obliger_utilisateur_connecte();

$message = null;
$message1 = null;
//on verifie l'etat du contenu de notre input
if (!empty($_POST['commentaire']) && isset($_POST['commentaire'])) {

    $commentaire = strip_tags($_POST['commentaire']);
    $id =  $_SESSION['user-connecte']['id'];
    date_default_timezone_set('Europe/Paris');
    $date = date('Y-m-d H:i:s');
    echo $date;
    //requète pour l'insert
    $sql = "INSERT INTO `commentaires`( `commentaire`, `id_utilisateur`,`date`) VALUES ('$commentaire', '$id' ,'$date')";
    var_dump($sql);
    // on insert dans la base de donnée
    $insert_commentaire = mysqli_query($bdd, $sql);

    // on redirige sur la page livre-or
    header('Location: livre-or.php');
    exit();
} elseif (!isset($_POST['submit'])) {
    $message1 = "Saisissez votre message dans le champ";
} else {
    $message = "vous n'avez saisi aucun message";
}


//var_dump($_POST);

//var_dump($_SESSION);


?>
<section class="formcommentaire">

    <?php if ($message1) : ?><p class="messageok"> <?= $message1; ?></p> <?php endif; ?>


    <?php if ($message) : ?><p class="messagealert"> <?= $message; ?></p> <?php endif; ?>


    <form class="formcom" action="" method="POST">
        <div>
            <label for="commentaire"></label>
            <textarea class="comment" name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Ecrivez votre commentaire"></textarea>
        </div>
        <!-- <input class="comment" type="textarea" name="commentaire" id="commentaire" placeholder="Ecrivez votre commentaire"> -->
        <div>
            <input class="element1" type="submit" name="submit" value="Publier">
        </div>
    </form>

    <div>
        <a href="livre-or.php"><button class="element2">Annuler</button></a>
    </div>

</section>

<?php require 'footer.php'; ?>