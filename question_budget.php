<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DUTAF | BUDGET</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        $(document).ready(function(){
            $('#loading_wrap').remove();
        });
    </script>
</head>
<body>
<?php
require "includes/header.php"
?>
<section id="section_budget_1">
    <form method="GET" action="reponse_budget.php">
        <h2>Indiquer votre budget :</h2>
        <p><input type="text" name="prixmax"> €</p>
        <p><input type="submit" name="Enregistrer" value="OK"></p>
    </form>
</section>
<div id='loading_wrap' style='position:fixed; height:100vh; width:100vw; overflow:hidden; top:0; left:0;'><img src="img/loading.gif"><p>Veuillez patienter</p></div>
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