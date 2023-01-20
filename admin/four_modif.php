<?php
require 'verification_connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
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
$four_id = $_GET['four_id'];
$bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');
$req2="SELECT * FROM fournisseurs WHERE four_id = '$four_id'";
$resultatmodif = $bdd->query($req2);
$four = $resultatmodif->fetch();
?>
<form action="four_modif_valid.php" method="get">
    <div>
        <?php
        echo '<input type="hidden" name="four_id" value="'. $four_id .'">
            <p>Nom du fournisseur</p>
            <input type="text" name="four_nom" value='.$four['four_nom'].'>
    </div>
    <div>
        <p>N° de Téléphone :</p>
        <input type="text" name="four_tel" value='.$four['four_tel'].'>
    </div>
    <div>
        <p>VILLE</p>
        <input type="text" name="four_ville" value="'.$four['four_ville'].'">'
        ?>
    </div>
    <input type="submit">
</body>
</html>