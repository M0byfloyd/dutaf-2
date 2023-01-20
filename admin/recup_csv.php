<?php
$bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');
$req = "SELECT * FROM articles INNER JOIN fournisseurs ON articles.four_id_=fournisseurs.four_id";
$resultat = $bdd->query($req);
$fichier = fopen("articles.csv", "a+");
// 4)pour chaque article du tableau récupérer afficher l'article et le mettre en forme
while ($linea=$resultat->fetch()) {
    $tableau = array($linea['art_design'],$linea['art_descript'],$linea['art_prix'],$linea['art_qte'],$linea['four_nom']);
    fputcsv($fichier, $tableau, ";");
}
$linea = 1;
fclose($fichier);
echo '<a download="articles.csv" href="articles.csv">Télécharger le fichier</a>';
echo '<a href="article_gestion.php"> Retour à la page gestion</a>'
?>