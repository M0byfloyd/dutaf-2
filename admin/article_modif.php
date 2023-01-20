<?php
require 'verification_connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
require("../includes/header_admin.php");
?>
<?php
$numart = $_GET['numart'];
$bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');
$req2="SELECT * FROM articles WHERE art_id = '$numart'";
$resultatmodif = $bdd->query($req2);
$art = $resultatmodif->fetch();
?>
<form class="centre" action="article_modif_valid.php" method="post" enctype="multipart/form-data">
    <div>
        <p>ID</p>
        <?php
            echo '<input type="hidden" name="numart" value="'. $numart .'">
            <p>DESIGNATION:</p>
            <input type="text" name="designation" value='.$art['art_design'].'>
    </div>
    <div>
        <p>DESCRIPTION :</p>
        <input type="text" name="description" value='.$art['art_descript'].'>
    </div>
    <div>
        <p>PRIX:</p>
        <input type="text" name="prix" value="'.$art['art_prix'].'">
    </div>
    <div>
        <p>QUANTITE :</p>
        <input type="text" name="quantite" value='.$art['art_qte'].'>
    </div>
        <p><input type="hidden" name="MAX_FILE_SIZE" value="100000">Image (seulement jpeg) : <input type="file" name="avatar"  id="avatar" accept="image/jpeg"></p>

    <input type="submit">
     <select name="four" >';
     $reqfour="SELECT * FROM fournisseurs ";
        $resultatfournisseurs = $bdd->query($reqfour);

        while ($un_four = $resultatfournisseurs->fetch()) {
            echo '<option value="' . $un_four['four_id'].'">'. $un_four['four_nom'].'</option>';
        };
        echo '</select></form>';
?>
</body>
</html>