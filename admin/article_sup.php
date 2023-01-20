<?php
require 'verification_connexion.php';
?>
<html>
...
<?php
$numart = $_GET['numart'];
$bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');

$req= "DELETE FROM articles WHERE art_id = $numart";
$bdd->query($req);
echo "<p>Vous venez de supprimer l'article n°". $numart . "</p>";
echo "<a href='article_gestion.php'>Retour à la page gestion</a>"
?>

</html>