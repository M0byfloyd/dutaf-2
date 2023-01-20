<?php
session_start();
?>
<html>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');

$util_nom= $_POST['login'];
$util_pass = sha1($_POST['passwd']);
$util_mail = $_POST['email'];
$util_perm = 0;
$req="INSERT INTO utilisateurs (utilisateur_login, utilisateur_mdp, utilisateur_mail, permission) VALUES ('$util_nom', '$util_pass', '$util_mail','$util_perm')";
$bdd->query($req);
echo "<p>Félicitation vous désormais inscris" . $util_nom . "gardez précieusement votre adresse email, elle pourrait vous servir.</p>";
echo "$util_mail";
echo "<a href='index.php'>Aller à la page d'accueil</a>"
?>
</html>