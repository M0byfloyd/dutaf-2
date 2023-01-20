<?php
require 'verification_connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GESTION FOURNISSEUR</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
</head>
<body>
<?php
require("../includes/header_admin.php");
?>
<a href="four_new.php">Ajouter un fournisseur</a>
<h2>Administration des fournisseurs</h2>
<table id="montableau">
    <thead><tr><td><p>Fournisseur</p></td><td><p>Siège social</p></td><td><p>N° de téléphone</p></td><td><p>...</p></td><td><p>...</p></td></tr></thead>
    <tbody>
    <?php
    // Se connecter a la base de donnée; préparer la requete sql pour recuperer les articles ;executer la requete et recuperer tous les articles ;pour chaque articles du tableau recuperer afficher l'article et le mettre
    $bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');
    $requete = "SELECT * FROM fournisseurs";

    $resultat = $bdd->query($requete);
    while($toto=$resultat->fetch()){
        echo "<tr>";
        echo "<td>".$toto['four_nom']."</td>";
        echo "<td>".$toto['four_ville']."</td>";
        echo "<td>".$toto['four_tel']."</td>";
        echo "<td><a href='four_modif.php?four_id=" . $toto['four_id'] ."'>Modifier</a></td>";
        echo "<td><a href='four_sup.php?four_id=" . $toto['four_id'] ."'>Supprimer</a></td>";
        echo "</tr>";

    }

    ?>

    </tbody>
</table>
</body>
</html>
