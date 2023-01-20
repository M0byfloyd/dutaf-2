<?php
session_start();
include('../includes/config.php');
if (isset($_SESSION['nom'])) {
    $dblink = new PDO('mysql:host=' . BDD_SERVER . ';dbname=' . BDD_DATABASE . '; charset=utf8', BDD_USER,
        BDD_PASSWORD);
    $requete = 'SELECT * FROM utilisateurs WHERE utilisateur_login = "' . $_SESSION['nom'] . '"';
    $exeuser = $dblink->query($requete);
    $user = $exeuser->fetch();
    // l'utilisateur est connecté, et il existe dans la BDD, alors on récupérer ses informations dans une variable $user

    if ($_SESSION['permission'] == 0) {
        header('Location: ../index.php');
    }
} else {
    header('Location: ../index.php');
    //il n'est pas connecté, on redirige.
}
?>