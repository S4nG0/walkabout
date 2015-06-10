<?php
$page = "actualites"
?>

<body class="actualites">

    <div class="main banner" data-stellar-background-ratio="0.5">
        <div class="container-fluid noPadding">
<?php 
include 'template/menu.php'; 
?>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h1>Les actualités <span class="uppercase">Walkabout</span></h1>

            
            <?php
            
            foreach($actus as $actu){
                if($actu->photos != null){
                        echo ''
                        . '<!-- begin:Actualité -->
                    <section class="block-actualite" id="actu1">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-responsive" src="'.img_url("$actu->photos").'" alt="Pérou">
                            </div>
                            <div class="col-md-8">
                                <h2>'.$actu->titre.'</h2>
                                <p><span class="published">par <a href="#">'.$actu->admin[0]->prenom.' '.$actu->admin[0]->nom.'</a>, le '.$actu->date.'
                                '.$actu->texte.'
                            </div>
                        </div>
                    </section>
                    <!-- end:Actualité -->'
                                . '';
                }else{
                    echo ''
                        . '<!-- begin:Actualité -->
                    <section class="block-actualite" id="actu1">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-responsive" src="'. img_url('logo-2.png') .'" alt="Walkabout">
                            </div>
                            <div class="col-md-8">
                                <h2>'.$actu->titre.'</h2>
                                <p><span class="published">par <a href="#">'.$actu->admin[0]->prenom.' '.$actu->admin[0]->nom.'</a>, le '.$actu->date.'
                                '.$actu->texte.'                                
                            </div>
                        </div>
                    </section>
                    <!-- end:Actualité -->'
                                . '';
                }
            }
            ?>
            

        </div> <!-- /.container -->

    </div>