<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['utilisateur']))
{
    $dblink = new PDO('mysql:host=' . BDD_SERVER . ';dbname=' . BDD_DATABASE . '; charset=utf8', BDD_USER,
        BDD_PASSWORD);
    $requete = 'SELECT * FROM utilisateurs WHERE utilisateur_login = "'.$_SESSION['utilisateur'].'"';
    $exeuser = $dblink->query($requete);

    while($user = $exeuser->fetch()) {
        // l'utilisateur est connecté, et il existe dans la BDD, alors on récupérer ses informations dans une variable $user
        echo $user['permission'];

        $_SESSION['permission'] = $user['permission'];
        $_SESSION['utilisateur_nom'] = $user['utilisateur_nom'];
    }
    header('Location: index.php');
} else {
    echo $_SESSION['permission'];
    echo $_SESSION['utilisateur_login'];
    echo $_SESSION['utilisateur_mdp'];
}
?>