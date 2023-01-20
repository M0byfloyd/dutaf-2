<?php
    require 'verification_connexion.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//:cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//:cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style.css">
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
    <a href="article_new.php">Ajouter un article</a>
    <a href="gestion.php">Retour</a>
    <h2>Administration du catalogue</h2>
    <?php
        echo "<p style='text-align: center;'>Nous sommes le " . date( 'd-m-Y') . " il est ". date('G:i:s') ."</p>";
        ?>
    <a href="recup_csv.php">Récupérer le tout au format csv</a>
    <table id="montableau">
        <thead><tr><td>Description</td><td>Prix</td><td>...</td><td>...</td><td>Image</td><td>Nom image</td></tr></thead>
        <tbody>
        <?php
        // Se connecter a la base de donnée; préparer la requete sql pour recuperer les articles ;executer la requete et recuperer tous les articles ;pour chaque articles du tableau recuperer afficher l'article et le mettre
        $bdd = new PDO('mysql:host=localhost;dbname=mmid19b12','mmid19b12','Ajpu2@pt');
        $requete = "SELECT * FROM articles INNER JOIN fournisseurs ON articles.four_id_ = fournisseurs.four_id";

        $resultat = $bdd->query($requete);
        while($toto=$resultat->fetch()){
            echo "<tr>";
            echo "<td>".mb_strtoupper($toto['art_descript'])."</td>";
            echo "<td>".$toto['art_prix']."</td>";
            echo "<td><a href='article_modif.php?numart=" . $toto['art_id'] ."'>Modifier</a></td>";
            echo "<td><a href='article_sup.php?numart=" . $toto['art_id'] ."'>Supprimer</a></td>";
            if (empty($toto['art_img'])) {
                echo "<td><p>Image non disponible</p></td>";
            }
            else{
                echo "<td><img style='height: 180px;' src='img_articles/". $toto['art_img'] ."'></td>";
            }
            echo  "<td><p>" .$toto['art_img'] ."</p></td>";
            echo "</tr>";
        }
        ?>

        </tbody>
    </table>
    <?php
    $requete_moyenne = "SELECT AVG(art_prix) as moyenne FROM articles";
    $resultat_moyenne = $bdd->query($requete_moyenne);
    $moy=$resultat_moyenne->fetch();
    $nombre_moyenne = $moy['moyenne'];
    echo '<p>La moyenne de tout les produits est de '. number_format($nombre_moyenne, 2, ',', ' ') .' € </p>';

    $tot_tab_p = 0;
    $prix =0;
    $total =0;
    $requete_t = "SELECT * FROM articles";
    $resultat_t = $bdd->query($requete_t);

    while ($tab_t = $resultat_t->fetch()) {
        $calcul_t = $tab_t['art_design'];
        $calcul_y = $tab_t['art_prix'];
        $prix = $prix + $calcul_y;
        $requete_p = "SELECT art_qte FROM articles WHERE art_design ='$calcul_t'";
        $resultat_p = $bdd->query($requete_p);

        while ($tab_p = $resultat_p->fetch()) {
            $qte = $tab_p[0];
            $total = $qte * $prix;
            $total = $total +$total;
        }
    }
    echo $total;



    ?>
    </body>
    </html>