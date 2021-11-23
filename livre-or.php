<?php
$title = "page livre or";
require 'header.php';
require 'bdd.php';

$sql = 'SELECT * FROM `utilisateurs`INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC';

$requete = mysqli_query($bdd, $sql);

$commentaires = mysqli_fetch_all($requete, MYSQLI_ASSOC);

//var_dump($commentaires);

echo "<table>
<caption><h1>Commentaires</h1></caption>";
foreach ($commentaires as $indice => $commentaire) {

    //setlocale(LC_TIME, "fr_FR", "french");
    $date = strftime("%A %d %B %G à %X", strtotime($commentaire['date']));

    echo " 
    <thead>
    <th>Posté le " . $date . " par " . $commentaire['login'] . " </th>
    </thead>
    <tbody>
    <tr>
        <td>" . $commentaire['commentaire'] . "</td>
    </tr>";
}

echo "</tbody>

</table>";

if (est_connecte()) :
?>
    <a href="commentaire.php"><button>Ajouter un commentaire</button> </a>
<?php endif; ?>


<!-- DELETE commentaires FROM `commentaires` INNER JOIN utilisateurs ON utilisateurs.id=commentaires.id_utilisateur WHERE commentaire -->
<?php

require 'footer.php';

?>