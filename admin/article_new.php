<?php
require 'verification_connexion.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un article</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="utf-8">
</head>
<body>
<h1>Ajouter un article</h1>
<form action="article_new_valid.php" method="POST" enctype="multipart/form-data">
    <p>Désignation : <input type="text" name="design"></p>
    <p>Description: <input type="text" name="descript"></p>
    <p>Prix : <input type="text" name="prix"></p>
    <p>Quantité : <input type="text" name="qte"></p>
    <p>Fournisseur : <select name="four">
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');
            $req2='SELECT * FROM fournisseurs';
            $resultat2 = $bdd->query($req2);

            while( $un_four = $resultat2->fetch() ) {
                echo '<option value="'.$un_four['four_id'].'">'.$un_four['four_nom'].'</option>';
            }
            ?>
        </select></p>
    <p><input type="hidden" name="MAX_FILE_SIZE" value="100000">Image (seulement jpeg) : <input type="file" name="avatar"  id="avatar" accept="image/jpeg"></p>
    <input type="submit" name="" value="OK">
</form>
<a href="article_gestion.php">retour</a>
</body>
</html>