<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>reponse budget</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
require "includes/header.php"
?>
<p>Voici les articles selon votre budget</p>
<table>
    <tr><td>Designation</td><td>Description</td><td>Prix</td><td>Quantité</td><td>Fournisseur</td></tr>

    <?php
    // Se connecter a la base de donnée; préparer la requete sql pour recuperer les articles ;executer la requete et recuperer tous les articles ;pour chaque articles du tableau recuperer afficher l'article et le mettre
    $bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');

    $prixmax=$_GET['prixmax'];
    $requete = "SELECT * FROM articles INNER JOIN fournisseurs ON articles.four_id_ = fournisseurs.four_id WHERE art_prix < $prixmax";

    $resultat = $bdd->query($requete);
    while($toto=$resultat->fetch()){
        echo "<tr>";
        echo "<td>".$toto['art_design']."</td>";
        echo "<td>".$toto['art_descript']."</td>";
        echo "<td>".$toto['art_prix']."</td>";
        echo "<td>".$toto['art_qte']."</td>";
        echo "<td>".$toto['four_id_']."</td>";
        echo "</tr>";

    }
    ?>
</table>
<?php
require 'includes/connect.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    // Une fois la page chargée, on gère les événements
    $( document ).ready(function() {
        $('#blu') .on("click", function () {
            $('#overlay').fadeIn();
            $('#overlay').css('display', 'flex');
        });
        $('#go_new') .on("click", function () {
            $('#form0').css('display', 'none');
            $('#form1').fadeIn();
            $('#form1').css('display', 'flex');

        });

        $('#fermer') .on("click", function () {
            $('#overlay').fadeOut();
        });
    });
</script>
</body>
</html>