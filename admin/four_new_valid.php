<?php
session_start();
require 'verification_connexion.php';
?>
<html>
...
<?php
$bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');

$four_nom= $_GET['four_nom'];
$four_ville = $_GET['four_ville'];
$four_tel = $_GET['four_tel'];
$req="INSERT INTO fournisseurs (four_nom, four_ville, four_tel) VALUES ('$four_nom', '$four_ville', '$four_tel')";
$bdd->query($req);
echo "<p>Vous venez d'ajouter " . $four_nom .  " comme nouveau fournisseur qui est situé dans la ville de " . $four_ville ." répondant au téléphone au numéro " . $four_tel . " </p>";
echo "<a href='four_gestion.php'>Retour à la page gestion</a>"
?>
</html>