<?php

$page = "home";

?>



<body class="home">



    <div class="main" id="main" data-stellar-background-ratio="0.5">

        <div class="overlay"></div>

        <div class="container-fluid noPadding">

            <!-- Navbar -->

            <?php include 'template/menu.php'; ?>



        </div>

        <div class="caption-wrapper">

            <div class="caption">

                <div class="row noPadding">

                    <div class="col-md-8 col-md-offset-2">

                        <h1>Savoir, échanger, partager et découvrir</h1>

                        <p>S'envoler vers des terres reculées<br />vivre une expérience inoubliable</p>

                    </div>

                </div>

                <div class="row noPadding">

                    <div class="arrow-wrapper">

                        <a href="#content"><i class="fa fa-angle-down"></i></a>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="content" id="content">

        <div class="container-fluid noPadding">

            <div class="row">

                <div class="col-md-6 content_block_left sameHeight">

                    <h1>Notre esprit</h1>

                    <p>

                    Walkabout est né d'une rencontre entre deux passionnés de  voyage, au détour d'un voyage en Chine.
                    L'un aventurier et ethnologue, a parcouru les continents pendant plus de
                    30 ans à la recherche de population reculé. L'autre professionnel du voyage, fabrique
                    des voyages clé en main et les revends aux tours opérateurs.
                    Walkabout est une agence de voyage spécialisée dans le voyage en immersion.
                    Nous donnons à nos client la possibilité de vivre une expérience inoubliable et
                    enrichissante et de la partager avec la communauté des voyageurs à travers
                    un carnet de voyage modulable.

                    </p>

                    <a href="about" class="button">En savoir plus</a>

                </div>

                <div class="col-md-6 content_block_right sameHeight">

                    <h1>Nos actualités</h1>

                    <?php

                        foreach($actus as $actu){

                              echo '<div class="row news">

                                        <div class="col-md-8">

                                            <p>'.$actu->titre.'</p><p><span class="published">par <a href="#">'.$actu->admin[0]->prenom.' '.$actu->admin[0]->nom.'</a>, le '.$actu->date.''

                                                    . '</span>

                                            </p>

                                        </div>

                                        <div class="col-md-4">

                                            <a href="'.base_url().'actus" class="button">LIRE LA SUITE</a>

                                        </div>

                                    </div>';

                        }

                    ?>

                </div>

            </div>

        </div>

    </div>



    <div class="content parallax" data-stellar-background-ratio="0.2" id="parallax"></div>



    <div class="content block_travel-logs noPadding" id="block_travel-logs">

        <div class="container-fluid noPadding">

            <div class="block_travel-logs_slider">

                <?php

                foreach($carnets as $carnet){

                    echo '<div class="slider__item">

                    <div class="row noPadding">

                        <div class="col-md-6 slider__item--text">

                            <h1>Carnets de voyage</h1>

                            <div class="row">

                                <div class="col-xs-12 col-md-4">

                                    <div class="slider__item--profile-picture">

                                        <img src="'.img_url($carnet->user[0]->photo).'" alt="photo utilisateur">

                                    </div>

                                </div>

                                <div class="col-xs-12 col-md-8">

                                    <h2>'.$carnet->titre.'</h2>

                                    <p>

                                        <span class="published">Publié par <a href="#">'.$carnet->user[0]->prenom.' '.$carnet->user[0]->nom.'</a>, le '.$carnet->date.'.</span>

                                    </p>

                                    <p>'.$carnet->description.'</p>

                                    <a href="'.base_url().'carnet/'.$carnet->idCarnetDeVoyage.'" class="button">Feuilletez le carnet</a>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6 slider__item--image" style=\'background: url("'.img_url($carnet->image_carnet).'") no-repeat;-moz-background-size: 100%, 100%;-o-background-size: 100%, 100%;-webkit-background-size: 100%, 100%;background-size: 100%, 100%;\'>

                        </div>

                    </div>

                </div>';

                }



                ?>



            </div>

        </div>

    </div>



    <div class="content block_destinations">

        <div class="container-fluid">

            <div class="row noPadding">

                <h1>Nos destinations</h1>

                <ul class="block_destinations__list">

                    <li class="block_destinations__item" id="peru">

                        <h3>Pérou</h3>

                    </li>

                    <li class="block_destinations__item" id="australia">

                        <h3>Australie</h3>

                    </li>

                    <li class="block_destinations__item" id="benin">

                        <h3>Bénin</h3>

                    </li>

                    <li class="block_destinations__item" id="vietnam">

                        <h3>Vietnam</h3>

                    </li>

                    <li class="block_destinations__item" id="ecuador">

                        <h3>Équateur</h3>

                    </li>

                </ul>

            </div>

            <div class="row noPadding">

                <div class="col-md-12">

                    <a href="#" class="block_destinations__button">Tous nos voyages</a>

                </div>

            </div>

        </div>

    </div>