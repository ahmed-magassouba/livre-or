<?php
session_start();
require_once 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($title)) {
            echo $title;
        } else {
            echo "Mon site";
        }  ?>
    </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>

        <div>
            <h1>Mon site</h1>
        </div>
        <div class="menu">
            <div >
                <h4 class="head"><?php if (!empty($_SESSION['user-connecte'])) {
                                        echo 'Salut ' . $_SESSION["user-connecte"]["login"];
                                    }
                                    ?>
                </h4>
            </div>

            <div class="child2">
                <a class="espace" href="index.php"><button class="button <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/index.php') : ?>buttonactif<?php endif; ?>">Accueil</button></a>

                <?php if (!est_connecte()) : ?>
                    <a href="connexion.php"><button class="button <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/connexion.php') : ?>buttonactif<?php endif; ?>">Connexion</button></a>
                    <a href="inscription.php"><button class="button <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/inscription.php') : ?>buttonactif<?php endif; ?>">Inscription </button></a>
                    <a href="livre-or.php"><button class="button <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/livre-or.php') : ?>buttonactif<?php endif; ?>">Livre-or</button></a>
                <?php else : ?>
                    <a href="profil.php"><button class="button <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/profil.php') : ?>buttonactif<?php endif; ?>">Profil</button></a>
                    <a href="livre-or.php"><button class="button <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/livre-or.php') : ?>buttonactif<?php endif; ?>">Livre-or</button></a>
                    <a href="deconnexion.php"><button class="button">Déconnexion</button></a>
                <?php endif; ?>

            </div>
        </div>
    </header>
    <main>