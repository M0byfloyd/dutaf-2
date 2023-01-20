<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');

if ($_SESSION['ext'] == '.jpg') {
    $req2 ="SELECT MAX(art_id) FROM articles";
    $exereq = $bdd->query($req2);
    $id = $exereq->fetch();
    $id = $id[0];

    $fichier = $_SESSION['nom_img'];
//header("Content-type: image/jpeg");

    $image = imagecreatefromjpeg($fichier);
    $fond = imagecolorallocate($image, 200, 200, 200);
    $couleur = imagecolorallocate($image, 0, 0, 255);
    $noir = imagecolorallocate($image, 0, 0, 0);
    $blanc = imagecolorallocate($image, 255, 255, 255);
    $rouge = imagecolorallocate($image, 255, 0, 0);

    $taille_relative = getimagesize($fichier);
    $taille_relative_x= 0;
    $taille_relative_y = $taille_relative[1] -10;

    $nom_final = 'image_' . $id;
    $font = './arial.ttf';
    $texte = 'COPYRIGHT DUTAF!';

    imagettftext($image, 40, 0, $taille_relative_x, $taille_relative_y, $rouge, $font, $texte);

    imagejpeg($image, $nom_final);
    $req="UPDATE articles SET art_img = '$nom_final' WHERE art_id = '$id'";
    $bdd->query($req);

    echo "Vous avez ajouté l'article " . $_SESSION['descript'] . "(" . $_SESSION['design'] . ")";
    echo "<p>" .$_SESSION['ext'] . " est le format de votre image </p>";
}


elseif ($_SESSION['ext'] == '.png') {
    $req2 ="SELECT MAX(art_id) FROM articles";
    $exereq = $bdd->query($req2);
    $id = $exereq->fetch();
    $id = $id[0];

    $fichier = $_SESSION['nom_img'];
//header("Content-type: image/jpeg");

    $image = imagecreatefrompng($fichier);
    $fond = imagecolorallocate($image, 200, 200, 200);
    $couleur = imagecolorallocate($image, 0, 0, 255);
    $noir = imagecolorallocate($image, 0, 0, 0);
    $blanc = imagecolorallocate($image, 255, 255, 255);
    $rouge = imagecolorallocate($image, 255, 0, 0);

    $taille_relative = getimagesize($fichier);
    $taille_relative_x= 0;
    $taille_relative_y = $taille_relative[1] -10;

    $nom_final = 'image_' . $id;
    $font = './arial.ttf';
    $texte = 'COPYRIGHT DUTAF!';

    imagettftext($image, 40, 0, $taille_relative_x, $taille_relative_y, $rouge, $font, $texte);

    imagepng($image, $nom_final);
    $req="UPDATE articles SET art_img = '$nom_final' WHERE art_id = '$id'";
    $bdd->query($req);

    echo "Vous avez ajouté l'article " . $_SESSION['descript'] . "(" . $_SESSION['design'] . ")";
    echo "<p>" .$_SESSION['ext'] . " est le format de votre image </p>";
} elseif ($i == 2) {
    echo "i égal 2";
}

unset($_SESSION['nom_img']);
unset($_SESSION['id_nom']);
unset ($_SESSION['design']);
unset ($_SESSION['descript']);
unset ($_SESSION['prix']);
unset($_SESSION['ext']);
echo "<a href='../article_gestion.php'>Retour à la gestion</a>"
?>