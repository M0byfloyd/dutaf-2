<?php
    session_start();
?>
<!DOCTYPE html>
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
<?php
require "includes/header.php"
?>
<table class="table">
    <thead>
    <tr>
        <th>Produit</th>
        <th>Code</th>
        <th>Prix U.</th>
        <th>Qté</th>
        <th>Prix TTC</th>
    </tr>
    </thead>
    <?php
    $somme = 0;
    foreach ($_SESSION['panier'] as $article){
        $prixttc = $article['prix'] * $article['quantite'];
        $somme += $prixttc;
        echo '<tr>
        <th>'.$article['nom'].'</th>
        <th>'.$article['code'].'</th>
        <th>'.number_format($article['prix'],2).' €</th>
        <th>'.$article['quantite'].'</th>
        <th>'.number_format($prixttc,2).' €</th>
    </tr>'  ;
    }
    ?>
    <tfoot>
    <tr>
        <td colspan="4" style="text-align: right">Total</td>
        <td><?php echo number_format($somme, 2); ?> €</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right">TVA</td>
        <td><?php $tva = $somme *0.2; echo number_format($tva, 2); ?> €</td>
    </tr>
    </tfoot>
</table>
<div class="row">
    <a href="delete.php" >Défaire son panier</a>
    <a href="catalogue.php">Accéder au catalogue</a>
</div>
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