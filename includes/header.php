<?php
if (isset($_SESSION["nom"])) {
    $nom = '<a class="navbar-brand" style="color: #1c7430;">Bienvenue ' . $_SESSION["nom"].'</a>';
} else {
    $nom = '<a class="navbar-brand" style="color: red;">Veuillez vous connecter</a>';
}
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">DUTAF</a>';
        echo $nom;
        echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">ACCUEIL <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="catalogue.php">CATALOGUE</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="question_budget.php">PETITS BUDGETS</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="new_util.php">SINSCRIRE</a>
                </li> 
                <li class="nav-item active">
                    <a class="nav-link" id="blu" href="#">SE CONNECTER</a>
                </li> 
                <li class="nav-item active">
                    <a class="nav-link" href="disconect.php">SE DECONNECTER</a>
                </li> 
                <li class="nav-item active">
                    <a class="nav-link" href="admin/gestion.php">PRIVE</a>
                </li>
            </ul>
        </div>
    </nav>'
?>