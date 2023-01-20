<?php
session_start();
include("includes/config.php");

$dblink = new PDO('mysql:host=' . BDD_SERVER . ';dbname=' . BDD_DATABASE . ';', BDD_USER,
    BDD_PASSWORD);

$password = sha1($_POST['password']);

$requete = 'SELECT * FROM utilisateurs WHERE utilisateur_login = "' . $_POST['login'] . '" and utilisateur_mdp = "' . $password . '"';

$exe = $dblink->query($requete);
$nbreponses = $exe->rowCount();

if ($nbreponses == 1) {
    //connexion OK
    $user = $exe->fetch(); //on récupérer les informations de l'utilisateur
    $_SESSION['permission'] = $user['permission'];
    $_SESSION['nom'] = $user['utilisateur_login'];
    header('Location: index.php'); //redirection vers l'accueil de l'administration
} else {
    header('Location: form_login.php');
}
?>