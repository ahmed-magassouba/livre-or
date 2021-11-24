<?php
require 'function.php';
require 'header.php';

?>

<section class="sectionindex">

    <?php if (est_connecte()) : ?>
        <div class="child1">
            <h1>Salut <?= $_SESSION['user-connecte']['login']; ?> bienvenue sur ma page</h1>


            <a class="lien" target="blank" href="https://github.com/ahmed-magassouba/livre-or.git">
                <h2> Acceder au projet github</h2>
            </a>
        </div>

        </div>
    <?php else : ?>
        <div class="">
            <a class="lien" href="connexion.php">
                <h2>Se connecter</h2>
            </a>
            <a class="lien" href="inscription.php">
                <h2>S'inscrire ?</h2>
            </a>
            <a class="lien" target="blank" href="https://github.com/ahmed-magassouba/livre-or.git">
                <h2>Voir le projet github</h2>
            </a>
        </div>
    <?php endif; ?>

</section>

<section class="seajt">
    <div class="el">
        <h2 class="textindex">Rejoignez notre communauté</h2>
    </div>

    <div class="el">
        <h2 class="textindex">Partagez vos idée</h2>
    </div>

    <div class="el">
        <h2 class="textindex">Exprimez vous</h2>
    </div>
</section>

<?php

require 'footer.php';

?>