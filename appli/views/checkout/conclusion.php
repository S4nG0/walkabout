<?php 
$page = 'payment'; 
?>

<body class="checkout">


<div class="main" id="main">
    <div class="container-fluid noPadding">
        <!-- Navbar -->
        <?php 
        
        set_include_path(dirname(__FILE__)."/../");
        require 'template/menu.php'; 
        
        ?>
    </div>
</div>

<div class="content">
    <div class="container">

        <!-- Conclusion -->
        <div class="row">
            <div class="conclusion">
                <div class="col-md-12">

                    <h1>Votre réservation est confirmée !</h1>
                    <p>
                        Merci d'avoir choisi Walkabout pour vivre votre prochaine aventure pleine d'expériences inoubliables !<br /><br />
                        Vous allez recevoir sous peu un e-mail contenant :
                    </p>
                    <ul>
                        <li>Le récapitulatif de votre réservation&nbsp;;</li>
                        <li>La procédure à suivre pour la constitution de votre dossier&nbsp;;</li>
                        <li>Un rappel des éléments à prévoir avant de vous embarquer dans votre aventure&nbsp;.</li>
                    </ul>

                    <div class="buttons-block">
                        <p>
                            Rendez-vous sur <a href="<?php echo base_url(); ?>moncompte">votre compte</a> pour suivre l'évolution de votre réservation&nbsp;!
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>