<?php
$title = "page livre or";
require 'header.php';
require 'bdd.php';

$sql = 'SELECT * FROM `utilisateurs`INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC';

$requete = mysqli_query($bdd, $sql);

$commentaires = mysqli_fetch_all($requete, MYSQLI_ASSOC);

//var_dump($commentaires);

echo "<h1 class='ajout'>";
if(est_connecte()){
    echo'<a href="commentaire.php"><button class="element4">Ajouter un commentaire</button> </a>';
}
echo"</h1>";

foreach ($commentaires as $indice => $commentaire) {

    setlocale(LC_TIME, "fr_FR", "french");
    $date = strftime("%A %d %B %G à %X", strtotime($commentaire['date']));

    echo " 
    <table>
    <thead>
    <th>Posté le <i class='color'>" . $date . "</i> par <i class='color'>" . $commentaire['login'] . "</i> </th>
    </thead>
    <tbody>
    <tr>
        <td>" . $commentaire['commentaire'] . "</td>
    </tr></tbody> </table>";
}



?>
    



<!-- DELETE commentaires FROM `commentaires` INNER JOIN utilisateurs ON utilisateurs.id=commentaires.id_utilisateur WHERE commentaire -->
<?php

require 'footer.php';

?>

