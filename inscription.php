<?php
$title = "page d'inscription";
require 'bdd.php';
require 'function.php';
require 'header.php';

$message = null;
if (!empty($_POST)) {

    $login = strip_tags($_POST['login']);
    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
    $confirm_password = strip_tags($_POST['confirm-password']);

    if (isset($login, $password) && !empty($login)  && !empty($password)) {

        // on verifi si on a un login correspondant 
        $sqlVerif =  "SELECT * FROM utilisateurs WHERE login = '$login'";
        $select = mysqli_query($bdd, $sqlVerif);

        //si on a une ligne correspondant a notre requete
        if (mysqli_num_rows($select)) {
            $message = "Ce login existe déjà , choisissez un autre";

            //si le login n'existe pas
        } elseif (password_verify($confirm_password, $password)) {

            //on insert dans la base de donnée
            $sql = "INSERT INTO `utilisateurs` ( `login`,`password`) VALUES ('$login','$password')";
            $requete = mysqli_query($bdd, $sql);

            header('Location: connexion.php');
            exit();
        } else {
            $message = "Les mots de passe ne sont pas identique";
        }
    } else {
        $message =  "vous avez des champs vide ";
    }
}

//Empecher l'utilisateur de revenir sur la page de connexion si il est deja connecté

//var_dump(est_connecte());
if (est_connecte()) {
    header('Location: index.php');
    exit();
}

mysqli_close($bdd);
?>
<section class="sectioncon">
    <div>
        <?php if ($message) : ?><p class="messagealert"> <?= $message; ?></p>
        <?php endif; ?>

        <form class="formcon" action="inscription.php" method="POST">
            <fieldset class="fieldsetcon">
                <div>
                    <legend>Inscription</legend>
                </div>

                <div>
                    <input class="inputelmt" type="text" name="login" required placeholder="login">
                </div>

                <div>
                    <input class="inputelmt" type="password" name="password" required placeholder="password">
                </div>

                <div>
                    <input class="inputelmt" type="password" name="confirm-password" placeholder="Confirmez votre mot de passe" required>
                </div>

                <div>
                    <input class="submitbutton" type="submit" value="Connexion">
                </div>

            </fieldset>
        </form>
    </div>
</section>


<?php

require 'footer.php';

?>