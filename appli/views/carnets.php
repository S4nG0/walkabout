<?php 
$page = 'carnets';
?>




<body class="list-carnet">

    <div class="main" id="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>

            <div class="row noPadding">
                <div class="featured-travel-log">
                    <div class="col-xs-12 col-sm-6 col-md-7 image-wrapper" style='background-size:cover;background: url("<?php echo img_url("$favoris->image_carnet"); ?>") no-repeat 0 0 transparent;'></div>
                    <div class="col-xs-12 col-sm-6 col-md-5 aside">
                        <h3>Carnet phare</h3>
                        <h1><?php echo $favoris->titre; ?></h1>
                        <p><?php echo $favoris->description; ?></p>
                        <div class="details">
                            <span class="auteur"><a href="#"><?php echo $favoris->user[0]->prenom.' '.$favoris->user[0]->nom; ?></a></span>
                            &nbsp;&bull;&nbsp;
                            <span class="pays"><?php echo $favoris->pays[0]->nom; ?></span>
                        </div>
                        <br/>
                        <a href="carnet/<?php echo $favoris->idCarnetDeVoyage; ?>" class="button">Feuilleter le carnet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="stories">
<?php

foreach($nonfavoris as $carnet){
    echo ''
    . '<!-- begin:Block-travel -->
            <div class="story-block">
                <a href="carnet/'.$carnet->idCarnetDeVoyage.'"><img class="img-responsive" src="'.  img_url($carnet->image_carnet).'" alt="Story"></a>
                <div class="content-wrapper">
                    <div class="content-inner">
                        <a class="no-style" href="carnet/'.$carnet->idCarnetDeVoyage.'"><h2>'.$carnet->titre.'</h2></a>
                        <a class="no-style" href="carnet/'.$carnet->idCarnetDeVoyage.'"><p>'.$carnet->description.'</p></a>
                        <div class="details">
                            <span class="auteur"><a href="#">'.$carnet->user[0]->prenom.' '.$carnet->user[0]->nom.'</a></span>
                            &nbsp;&bull;&nbsp;
                            <span class="pays">'.$carnet->pays[0]->nom.'</span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- endblock:Block-travel -->'
            . '';
}

?>
        </div>
    </div>