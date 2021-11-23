<?php

$title = "page de profil";
require 'header.php';
require 'bdd.php';

obliger_utilisateur_connecte();


// mes informations actuelle dans ma session venant de la bdd
$id = $_SESSION['user-connecte']['id'];
$login = $_SESSION['user-connecte']['login'];
$password = $_SESSION['user-connecte']['password'];


//var_dump($_SESSION);

$message = null;


if (!empty($_POST)) {
    //les informations qui seront saisi par l'utilisateur pour les modifications
    $loginp =  strip_tags($_POST['login']);
    $passwordp = strip_tags($_POST['password']);
    $confirm_password = strip_tags($_POST['confirm-password']);

    if (password_verify($confirm_password, $passwordp) || $confirm_password == $passwordp) {
        // $passwordp = password_hash($_POST['password'], PASSWORD_ARGON2I);
        //Requète sql pour mettre a jour les informations dans la base de donnée
        $sql = "UPDATE `utilisateurs` SET `login`='$loginp',`password`='$passwordp' WHERE id = $id";
        $requete = mysqli_query($bdd, $sql);

        //mettre a jour les infos dans ma session
        $_SESSION['user-connecte']['login'] = $loginp;

        // $_SESSION['user-connecte']['password'] = $passwordp;

        // var_dump($requete);
       // header('Location: index.php ');
        //exit();
    } else {
        $message = "Votre mot de passe est incorrect";
    }
}

//var_dump(est_connecte());
?>


<section class="sectioncon">
    <div>
        <?php if ($message) : ?><p class="messagealert"> <?= $message; ?></p>
        <?php endif; ?>

        <form class="formcon" action="profil.php" method="POST">
            <fieldset class="fieldsetcon">
                <div>
                    <legend>Profil</legend>
                </div>

                <div>
                    <input class="inputelmt" type="text" name="login" value="<?= htmlentities($login); ?>" required>
                </div>

                <div>
                    <input class="inputelmt" type="password" name="password" value="<?= htmlentities($password); ?>" raquired>
                </div>

                <div>
                    <input class="inputelmt" type="password" name="confirm-password" placeholder="Confirmez votre mot de passe" required>
                </div>

                <div>
                    <input class="submitbutton" type="submit" value="Mettre a jour mon profil">
                </div>

            </fieldset>
        </form>
    </div>
</section>


<?php

require 'footer.php';

?>