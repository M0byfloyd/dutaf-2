<?php
session_start();
require 'verification_connexion.php';
?>
<html>
...
<?php
$four_id = $_GET['four_id'];
$bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');

$req= "DELETE FROM fournisseurs WHERE four_id = $four_id";
$bdd->query($req);
echo "<p>Vous venez de supprimer le fournisseur n°". $four_id . "</p>";
echo "<a href='four_gestion.php'>Retour à la page gestion</a>"
?>

</html>