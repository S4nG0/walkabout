<?php 
$page='destinations'; 
?>

<body class="list-destination">

    <div class="main" id="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>

        <div class="row noPadding">
            <div class="big-title-wrapper">
                <div class="big-title">
                    <h1>Un Monde d'Expériences</h1>
                    <p>
                        Partez dans une contrée reculée,<br>et partagez votre expérience avec les autres
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid noPadding">

            
            <?php
            
                foreach($destinations as $destination){
                    $image = img_url($destination->banner);
                        echo ''
                        . '<!-- Destination -->
            <div class="destination-block">
                <div class="row noPadding">
                    <div class="image-wrapper">
                        <a class="no-style" href="'.base_url().'voyage/'.$destination->idDestination.'">
                            <div class="image-container" style=\'background: url("'.$image.'") 50% 0 no-repeat ;\'></div>
                        </a>
                    </div>
                    <div class="text-container">
                        <a class="no-style" href="'.base_url().'voyage/'.$destination->idDestination.'">
                            <h1>'.$destination->titre.'</h1>
                            <h3>'.$destination->pays[0]->nom.'&nbsp;&bull;&nbsp;'.$destination->ville.'</h3>
                            <p>'.$destination->nom.'</p>
                            <p class="price">À partir de <strong>'.$destination->prix_min.' € par personne</strong></p>
                            <p></p>
                            <a href="'.base_url().'voyage/'.$destination->idDestination.'" class="button align-left">Voir la destination</a>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end:Destination -->'
                                . '';
                }
            
            ?>
        </div>
    </div>