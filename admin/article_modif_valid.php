<?php
require 'verification_connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
<?php
$bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');

$art_design = $_POST['designation'];
$art_descript = $_POST['description'];
$art_prix = $_POST['prix'];
$numart = $_POST['numart'];
$art_qte = $_POST['quantite'];
$art_prix_total =$art_qte*$art_prix;
$_SESSION['nom_img'] = $fichier = basename($_FILES['avatar']['name']);

$req="UPDATE articles SET art_design = '$art_design ', art_descript = '$art_descript' , art_prix ='$art_prix', art_qte ='$art_qte' img_art='$fichier' WHERE art_id = '$numart '";
$bdd->query($req);


$dossier = 'img_articles/';
$taille_maxi = 100000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$_SESSION['ext'] = $extension = strrchr($_FILES['avatar']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
    $erreur = 'Vous devez uploader un fichier de type png ou jpg';
}
if($taille>$taille_maxi)
{
    $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
    //On formate le nom du fichier ici...
    $fichier = strtr($fichier,
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
        header('Location: img_articles/traitement_image2.php');
    }
    else //Sinon (la fonction renvoie FALSE).
    {
        echo 'Echec de l\'upload !';
    }
}
else
{
    echo $erreur;
}
?>
echo "<section><p>Vous venez de modifier pour " . $art_qte .  " quantité de " . $art_descript ." pour un total de " . $art_prix_total . "€ </p>";
echo "<a href='article_gestion.php'>Retour à la page gestion</a></section>";
?>
</html>