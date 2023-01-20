<?php
session_start();
include('../includes/config.php');
if (isset($_SESSION['utilisateur']))
{
    $dblink = new PDO('mysql:host=' . BDD_SERVER . ';dbname=' . BDD_DATABASE . '; charset=utf8', BDD_USER,
        BDD_PASSWORD);
    $requete = 'SELECT * FROM utilisateurs WHERE utilisateur_login = "'.$_SESSION['utilisateur'].'"';
    $exeuser = $dblink->query($requete);
    $user = $exeuser->fetch();
    // l'utilisateur est connecté, et il existe dans la BDD, alors on récupérer ses informations dans une variable $user
} else {
    header('Location: form_login.html');
    //il n'est pas connecté, on redirige.
}
?>