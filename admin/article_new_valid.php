<?php
require 'verification_connexion.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="utf-8">
</head>
<body>
<?php
$_SESSION['design'] = $design = $_POST['design'];
$_SESSION['descript'] = $descript = $_POST['descript'];
$prix = $_POST['prix'];
$qte = $_POST['qte'];
$four = $_POST['four'];

$dblink = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');
$req="INSERT INTO articles (art_design, art_descript, art_prix, art_qte, four_id_) VALUES('$design', '$descript', '$prix', '$qte', '$four')";
$dblink->query($req);
$dossier = 'img_articles/';
$_SESSION['nom_img'] = $fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$_SESSION['ext'] = $extension = strrchr($_FILES['avatar']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
    $erreur = 'Vous devez uploader un fichier de type jpg';
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
        header('Location: img_articles/traitement_image.php');
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
<a href="article_new.php">Recommencer</a>
<a href="article_gestion.php">retour</a>
</body>
</html>