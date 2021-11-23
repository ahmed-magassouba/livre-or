<?php

$title = "page de connexion";
require_once 'function.php';
require 'header.php';
require 'bdd.php';




///////////////////////////////////////////
///// VERIFICATION DU FORMULAIRE ///////
//////////////////////////////////////////


$message = null;      // Message à afficher à l'utilisateu

if (!empty($_POST)) {

    if (isset($_POST['login'], $_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])) {

        $login = strip_tags($_POST['login']);
        $password = strip_tags($_POST['password']);

        $sql = "SELECT * FROM `utilisateurs` WHERE login = '$login' ";
        $requete = mysqli_query($bdd, $sql);
        //var_dump($requete);

        $utilisateur = mysqli_fetch_all($requete, MYSQLI_ASSOC);


        //les conditions de connexion et redirection vers la page de profil

        if (count($utilisateur) > 0) {

            if (password_verify($password, $utilisateur[0]['password']) || $password == $utilisateur[0]['password']) {

                $_SESSION['user-connecte'] = [
                    "id" => $utilisateur[0]["id"],
                    "login" => $utilisateur[0]["login"],
                    "password" => $utilisateur[0]["password"]
                ];
                // var_dump($_SESSION);
                //var_dump($_SESSION['user']);

                header('Location: index.php');
                exit();
            } else {
                $message = 'Le login ou le mot de passe est incorrect ';
            }
        }
    }
    if (empty($utilisateur)) {
        $message = "Le login ou le mot de passe est incorrect";
    }
}

//var_dump(est_connecte());
//Empecher l'utilisateur de venir sur cette page si il est connecté
if (est_connecte()) {
    header('Location: index.php ');
    exit();
}



?>
<section class="sectioncon">
    <div>
     <?php if($message) : ?><p class="messagealert"> <?=$message;?></p>
        <?php endif ; ?>
                                   
        <form class="formcon" action="connexion.php" method="POST">
            <fieldset class="fieldsetcon">
                <div>
                    <legend>Connexion</legend>
                </div>
                <div>
                    <input class="inputelmt" type="text" name="login" required placeholder="login">
                </div>
                <div>
                    <input class="inputelmt"  type="password" name="password" required placeholder="password">
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