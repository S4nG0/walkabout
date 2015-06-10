<nav class="navbar navbar-default" id="#navigation">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

        <a class="navbar-brand" href="<?php echo base_url(); ?>">

            <img class="logo" src="<?php echo img_url('logo.png');?>" alt="Walkabout">

        </a>

        <button id="toggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">

            <span class="sr-only">Toggle navigation</span>

            <i id="icon" class="fa fa-bars"></i>

        </button>

    </div>



    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="navbar-collapse collapse noPadding" id="navbar">

        <ul class="nav navbar-nav navbar-right">



            <?php if ($page == "destinations" || $page == "single-destination") { ?>



                <li><a class="nav_links active" href="<?php echo base_url(); ?>voyage" title="Consultez nos destinations">Nos destinations</a></li>



            <?php } else { ?>



                <li><a class="nav_links" href="<?php echo base_url(); ?>voyage" title="Consultez nos destinations">Nos destinations</a></li>



            <?php }; ?>



            <?php if ($page == "carnets" || $page == "single-carnet") { ?>



                <li><a class="nav_links active" href="<?php echo base_url(); ?>carnet" title="Consultez les carnets de voyages">Carnets de voyages</a></li>



            <?php } else { ?>



                <li><a class="nav_links" href="<?php echo base_url(); ?>carnet" title="Consultez les carnets de voyages">Carnets de voyages</a></li>



            <?php }; ?>





            <?php if ($page == "esprit") { ?>



                <li><a class="nav_links active" href="<?php echo base_url(); ?>esprit" title="En savoir plus sur Walkabout">Notre esprit</a></li>



            <?php } else { ?>



                <li><a class="nav_links" href="<?php echo base_url(); ?>esprit" title="En savoir plus sur Walkabout">Notre esprit</a></li>



            <?php }; ?>





            <?php if ($page == "contact") { ?>



                <li><a class="nav_links active" href="<?php echo base_url(); ?>contact" title="Contactez-nous !">Nous contacter</a></li>



            <?php } else { ?>



                <li><a class="nav_links" href="<?php echo base_url(); ?>contact" title="Contactez-nous !">Nous contacter</a></li>



            <?php }; ?>





            <?php

            if($connecte == true){

                if ($page == "moncompte") {

                    echo ' <li><a class="nav_links active" href="'.base_url().'deconnexion" title="Déconnexion"><i class="fa fa-sign-in"></i>Se déconnecter</a></li>';

                } else {

                    echo '<li><a class="nav_links" href="'.base_url().'moncompte" title="AccÃ¨dez Ã  votre compte"><i class="fa fa-sign-in"></i>Mon compte</a></li>';

                }

            }else{

                if ($page == "account") {

                    echo ' <li><a class="nav_links active" href="'.base_url().'connexion" title="AccÃ¨dez Ã  votre compte"><i class="fa fa-sign-in"></i>Se connecter</a></li>';

                } else {

                    echo '<li><a class="nav_links" href="'.base_url().'connexion" title="AccÃ¨dez Ã  votre compte"><i class="fa fa-sign-in"></i>Se connecter</a></li>';

                }

            }





            ?>



        </ul>

    </div><!-- /.navbar-collapse -->

</nav>