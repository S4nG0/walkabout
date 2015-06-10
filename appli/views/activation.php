<?php
$page = "moncompte";
?>

<body class="espace-voyageur">

    <div class="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>
    </div>

    <div class="content">
        <?php
            
            switch ($result) {
                case false : echo "<h3 style='padding:50px;'>Une erreur est survenue, veuillez réessayer!</h3>";
                    break;
                case "active" : echo "<h3 style='padding:50px;'>Votre compte est déja activé!</h3>";
                    break;
                case "done" : echo "<h3 style='padding:50px;'>Votre compte à bien été activé!</h3>";
                    break;
                case "non_active" : echo "<h3 style='padding:50px;'>Votre compte n'est pas encore actif! Veuillez l'activer avant de continuer!</h3>";
                    break;
            }
        
        ?>
    </div>