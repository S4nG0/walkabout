<?php

$page = "single-destination";

?>

<body class="single-destination">



    <div class="main banner" style="background: url(<?php echo img_url($destination[0]->banner) ?>) !important;">

        <div class="container-fluid noPadding">

            <!-- Navbar -->

            <?php include 'template/menu.php'; ?>

        </div>

    </div>

    <!-- block:Introduction -->

    <div class="content">

        <div class="introduction">

            <div class="container">

                <div class="row">

                    <div class="col-md-8 introduction_description sameHeight">

                        <h1><?php echo $destination[0]->titre; ?></h1>

                        <p>

                            <?php echo $destination[0]->description; ?>

                        </p>

                    </div>

                    <div class="col-md-4 introduction_aside sameHeight">

                        <h1>Informations</h1>

                        <ul id="introduction_aside--infos">

                            <?php

                            foreach ($infos_pays[0] as $key => $value) {

                                if ($key != 'idPays' && $key != 'nom') {

                                    echo '<li>' . ucfirst($key) . ' : ' . $value . '</li>';

                                }

                            }

                            ?>

                        </ul>

                        <div id="introduction_aside--social">

                            <a class="item_fb" href="#" target="blank">

                                <i class="fa fa-facebook"></i>

                            </a>

                            <a class="item_tw" href="#" target="blank">

                                <i class="fa fa-twitter"></i>

                            </a>

                            <a class="item_gp" href="#" target="blank">

                                <i class="fa fa-google-plus"></i>

                            </a>

                        </div>

                        <a class="button" href="#travel-logs">Carnets de voyage</a>

                    </div>

                </div>

            </div>

        </div>

        <!-- endblock:Introduction -->



        <!-- block:Information module -->



        <div class="container-fluid information">

            <div class="row">

                <div class="col-md-12 information__box" id="information__box">

                    <ul class="col-sm-2 col-md-2 information__box--list">

                        <li class="ui-state-focus">

                            <a href="#practical-information">

                                <div class="icon-wrapper">

                                    <i class="fa fa-info-circle"></i>

                                </div>

                                <span class="arrow"></span>

                            </a>

                        </li>

                        <li id="map-trigger">

                            <a href="#map-canvas">

                                <div class="icon-wrapper">

                                    <i class="fa fa-map-marker"></i>

                                </div>

                                <span class="arrow"></span>

                            </a>

                        </li>

                        <li>

                            <a href="#dates">

                                <div class="icon-wrapper">

                                    <i class="fa fa-calendar"></i>

                                </div>

                                <span class="arrow"></span>

                            </a>

                        </li>

                    </ul>

                    <div class="col-sm-10 col-md-10 information__box--content">

                        <div class="tab-content" id="practical-information">

                            <ul class="tab-content__list">

                                <?php

                                foreach ($infos_destination as $key => $value) {



                                    echo '<li>

                                                <img src="' . img_url($value->image) . '" alt="' . $value->titre . '">

                                                <p>' . strtoupper($value->valeur) . '</p>

                                            </li>';

                                }

                                ?>

                            </ul>

                            <ul class="tab-content__details">

                                <?php

                                foreach ($infos_complementaires as $key => $value) {

                                    echo '<li>' . ucfirst($value->information) . '</li>';

                                }

                                ?>

                            </ul>

                        </div>

                        <div class="tab-content" id="map-canvas">



                        </div>

                        <div class="tab-content" id="dates">

                            <ul>

                                <?php

                                $i = 0;

                                foreach ($voyages as $key => $value) {

                                    $i++;

                                    echo 'Voyage n°' . $i;

                                    echo '<li>Date de départ : ' . ucfirst($value->date_depart) . '</li>';

                                    echo '<li>Date de retour : ' . ucfirst($value->date_retour) . '</li>';

                                    echo '<hr>';

                                }

                                ?>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- block:Order button -->

        <div class="container">

            <div class="row order">

                <a href="<?php echo site_url('/checkout/dates/'.$destination[0]->idDestination); ?>" class="button">Je réserve</a>

            </div>

        </div>

        <!-- endblock:Order button -->



        <!-- block:Gallery -->

        <div class="container-fluid gallery">

            <div class="row noPadding">

                <ul class="grid">

                    <?php

                    $photos = array();

                    $photos = explode(";", $destination[0]->photos);

                    foreach ($photos as $key => $photo) {

                        if ($photo != "") {

                            echo '<li>

                                    <figure>

                                        <img src="' . img_url($photo) . '" alt="photo' . $key . '">

                                        <figcaption>

                                            <div class="caption-content">

                                                <!-- Lien vers galerie fancybox -->

                                                <a class="fancybox" rel="group" href="' . img_url($photo) . '">

                                                    <i class="fa fa-search"></i>

                                                    <p>Agrandir l\'image</p>

                                                </a>

                                            </div>

                                        </figcaption>

                                    </figure>

                                </li>';

                        }

                    }

                    ?>

                </ul>

            </div>

        </div>

        <!-- endblock:Gallery -->



        <!-- block:Travel-logs -->

        <div class="travel-logs" id="travel-logs">

            <div class="container">

                <h1>Ont participé à ce voyage...</h1>

                <ul class="travel-logs_list">

                    <?php

                    foreach ($carnets as $carnet) {

                        echo '<li class="travel-logs__item">

                            <div class="row">

                                <div class="col-xs-12 col-sm-4">

                                    <a href="">

                                        <div class="profile-picture">

                                            <img src="' . img_url($carnet->user[0]->photo) . '" alt="profile_picture">

                                        </div>

                                    </a>

                                </div>

                                <div class="col-xs-12 col-sm-8">

                                    <div class="excerpt">

                                        <h3>' . $carnet->titre . '</h2>

                                            <p class="published">

                                                par <a href="#">' . $carnet->user[0]->prenom . ' ' . $carnet->user[0]->nom . '</a>, le ' . $carnet->date . '

                                            </p>

                                            <p>

                                                ' . $carnet->description . '

                                            </p>

                                            <a class="featured" href="'.base_url().'carnet/' . $carnet->idCarnetDeVoyage . '">Feuilletez le carnet&nbsp;<i class="fa fa-long-arrow-right"></i></a>

                                    </div>

                                </div>

                            </div>

                        </li>';

                    }

                    ?>

                </ul>

            </div>

        </div>

    </div>

    <!-- endblock:Travel-logs -->





    <!-- block:Share -->

    <div class="container-fluid share">

        <div class="row align-center noPadding">

            <div class="col-md-4 col-md-offset-4">

                <h1>Vous aimez cette destination&nbsp;?</h1>

                <p class="italic">Partagez-la avec vos amis&nbsp;!</p>

                <div class="social">

                    <a class="item_fb" href="#" target="blank">

                        <i class="fa fa-facebook"></i>

                    </a>

                    <a class="item_tw" href="#" target="blank">

                        <i class="fa fa-twitter"></i>

                    </a>

                    <a class="item_gp" href="#" target="blank">

                        <i class="fa fa-google-plus"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- endblock:Share -->



    <script type="text/javascript"

            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRVwAj7kPRNKUkbpvMy0o-b-o37zFSQSc">

    </script>



    <script type="text/javascript">

        //Google Maps init

        window.onload = function () {

            $('#map-trigger').click(function () {

                mapInitialize(<?php echo $destination[0]->coordonnees; ?>);

            });

            $('#map-trigger').bind('touchstart', function (event) {

                mapInitialize(<?php echo $destination[0]->coordonnees; ?>);

            });

        }



    </script>