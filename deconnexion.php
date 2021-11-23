<?php
session_start();

unset($_SESSION['user-connecte']);
header('Location: connexion.php');

?>


