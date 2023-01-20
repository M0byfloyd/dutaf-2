<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DUTAF | CATALOGUE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
        $(document).ready( function () {

            $('#montableau').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"}
            });
        } );
    </script>
    <script>
        $(document).ready(function(){
            $('#loading_wrap').remove();
        });
    </script>
    </head>
    <body class="container-fluid">
    <?php
    require "includes/header.php"
    ?>


    <h2>Voici notre catalogue !</h2>
    <table id="montableau">
        <thead><tr><td>Description</td><td>Prix</td><td>Quantité</td><td>Fournisseur</td><td>Images (selon disponibilité)</td></td><td>Panier</td></tr></thead>
        <tbody>
        <?php
        echo "<p style='text-align: center;'>Nous sommes le " . date( 'd-m-Y') . " il est ". date('G:i:s') ."</p>";
        // Se connecter a la base de donnée; préparer la requete sql pour recuperer les articles ;executer la requete et recuperer tous les articles ;pour chaque articles du tableau recuperer afficher l'article et le mettre
        $bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');
        $requete = "SELECT * FROM articles INNER JOIN fournisseurs ON articles.four_id_ = fournisseurs.four_id";
        $resultat = $bdd->query($requete);
        while($toto=$resultat->fetch()){
            echo "<tr>";
            echo "<td>".mb_strtoupper($toto['art_descript'])."</td>";
            echo "<td>".$toto['art_prix']."</td>";
            echo "<td>".$toto['art_qte']."</td>";
            echo "<td>".$toto['four_nom']."</td>";
        if (empty($toto['art_img'])) {
            echo "<td><p>Image non disponible</p></td>";
        }
        else {
            echo "<td><img style='height: 180px;' src='admin/img_articles/" . $toto['art_img'] . "'></td>";
        }
            echo '<td><a href="ajout_panier.php?panid=' . $toto['art_id']. '">Ajouter au panier</a>';
            echo "</tr>";
        }
        ?>

        </tbody>
    </table>
    <div id='loading_wrap' style='position:fixed; height:100vh; width:100vw; overflow:hidden; top:0; left:0;'><img src="img/loading.gif"><p>Veuillez patienter</p></div>
    <?php
    require 'includes/connect.php';
    ?>
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
