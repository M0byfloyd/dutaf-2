<?php
session_start();
?>
<?php
require "includes/header.php"
?>
<?php
include("includes/config.php");
$numart = $_GET['panid']; //récupération de l'ID passé par le catalogue
$dblink = new PDO('mysql:host=' . BDD_SERVER . ';dbname=' . BDD_DATABASE . '; charset=utf8', BDD_USER,
    BDD_PASSWORD); //connexion à la BDD
 $requete = 'SELECT * FROM articles WHERE art_id = ' . $numart;
 $exearticle = $dblink->query($requete);
$article = $exearticle->fetch(); //récupération du premier (et normalement unique) article retourné par la requête

 //On construit un tableau contenant les informations de l'article, qui seront sauvegardées dans le panier
     $tableau = array(
         'nom'      => $article['art_descript'],
         'code'     => $article['art_design'],
         'prix'     => $article['art_prix'],
         'quantite' => 1
     );

     //si le panier existe on ajoute le produit
    if (isset($_SESSION['panier']))
    {
        if (isset($_SESSION['panier'][$article['art_id']]))
        {
            //mise à jour, puisque le produit est déjà présent
            $_SESSION['panier'][$article['art_id']]['quantite']++;
        } else{
            $_SESSION['panier'][$article['art_id']] = $tableau;
        }
    } else
    {
        //sinon, on initialise le panier et on ajoute le produit.
        $_SESSION['panier'] = array();
        $_SESSION['panier'][$article['art_id']] = $tableau;
    }
?>
<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
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
</head>
<body class="container-fluid">
<h2>Le produit <?php echo $article['art_descript']; ?> a été ajouté au panier.</h2>

<?php
require 'includes/connect.php';
?>
<div class="row">
    <a style="font-size: large;" href="panier.php">Panier</a>
    <a style="font-size: large;"  href="catalogue.php">Retour</a>
</div>
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