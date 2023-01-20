<?php
require 'verification_connexion.php';
?>
<html>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');

$four_id = $_GET['four_id'];
$four_tel = $_GET['four_tel'];
$four_nom = $_GET['four_nom'];
$four_ville = $_GET['four_ville'];
$req="UPDATE fournisseurs SET four_tel = ' $four_tel ', four_nom = '$four_nom', four_ville = '$four_ville' WHERE four_id = '$four_id '";
$bdd->query($req);
echo "<p>Vous venez de modifier le fournisseur n° " . $four_id .  " pour qu'il ait le nom " . $four_nom ." le numéro de téléphone " . $four_tel. " et venant de " . $four_ville ." </p>";
echo "<a href='four_gestion.php'>Retour à la page gestion</a>"
?>
</html>