<?php
    session_start();
    unset($_SESSION['panier']);
    echo "Panier supprimé avec succès";
    echo "<a href='catalogue.php'>Retour au catalogue</a>";
?>